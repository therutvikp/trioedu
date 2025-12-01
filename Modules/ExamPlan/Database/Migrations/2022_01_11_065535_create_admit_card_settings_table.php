<?php

use App\Models\SchoolModule;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Modules\ExamPlan\Entities\AdmitCardSetting;
use Modules\RolePermission\Entities\TrioModuleInfo;
use Modules\RolePermission\Entities\TrioModuleStudentParentInfo;
use Modules\RolePermission\Entities\TrioPermissionAssign;

class CreateAdmitCardSettingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admit_card_settings', function (Blueprint $blueprint): void {
            $blueprint->id();
            $blueprint->boolean('student_photo')->nullable();
            $blueprint->boolean('student_name')->nullable();
            $blueprint->boolean('admission_no')->nullable();
            $blueprint->boolean('class_section')->nullable();
            $blueprint->boolean('exam_name')->nullable();
            $blueprint->boolean('academic_year')->nullable();
            $blueprint->boolean('principal_signature')->nullable();
            $blueprint->boolean('class_teacher_signature')->nullable();
            $blueprint->boolean('gaurdian_name')->nullable();
            $blueprint->boolean('school_address')->nullable();
            $blueprint->boolean('student_download')->nullable();
            $blueprint->boolean('parent_download')->nullable();
            $blueprint->boolean('student_notification')->nullable();
            $blueprint->boolean('parent_notification')->nullable();
            $blueprint->string('principal_signature_photo')->nullable();
            $blueprint->string('teacher_signature_photo')->nullable();
            $blueprint->integer('school_id')->nullable()->default(1)->unsigned();
            $blueprint->integer('academic_id')->nullable()->default(1)->unsigned();
            $blueprint->integer('admit_layout')->default(1);
            $blueprint->string('admit_sub_title')->nullable();
            $blueprint->text('description')->nullable();
            $blueprint->timestamps();
        });
        $column = 'ExamPlan';
        if (! Schema::hasColumn('sm_general_settings', $column)) {
            Schema::table('sm_general_settings', function (Blueprint $blueprint) use ($column): void {
                $blueprint->integer($column)->default(0);
            });
        }

        try {
            $setting = AdmitCardSetting::first();
            if (! $setting) {
                $setting = new AdmitCardSetting();
                $setting->student_photo = 1;
                $setting->student_name = 1;
                $setting->admission_no = 1;
                $setting->class_section = 1;
                $setting->exam_name = 1;
                $setting->academic_year = 1;
                $setting->principal_signature = 1;
                $setting->class_teacher_signature = 1;
                $setting->school_address = 1;
                $setting->gaurdian_name = 1;
                $setting->student_download = 1;
                $setting->parent_download = 1;
                $setting->student_notification = 1;
                $setting->parent_notification = 1;
                $setting->description = <<<'EOD'
                <p class="fs-18 fw-bold text-black text-center text-underline">Rules to be followed by the candidates</p>
                    <div class="h-10"></div>
                    <ul>
                        <li class="fs-14 fw-meidum text-black"><span></span>Admit card must be collected before two days of the exam.</li>
                        <li class="fs-14 fw-meidum text-black"><span></span>Candidates should take their seats 15 minutes before starting of the exam.</li>
                        <li class="fs-14 fw-meidum text-black"><span></span>Candidates can use their own pen, pencil and scientific calculator in the exam hall.</li>
                        <li class="fs-14 fw-meidum text-black"><span></span>The examination will be held on the specified date and time as per the pre-announced examination’s routine.</li>
                        <li class="fs-14 fw-meidum text-black"><span></span>No student will be allowed to enter the examination hall with any paper, books, mobile phone, except without admit card.</li>
                    </ul>
                EOD;
                $setting->save();
            }

            $leadTrioModuleIds = [
                [3100, 50, 0, '1', 0, 'ExamPlan', 'examplan', 'examplan', '', 1, 1, 1, 1, '2021-10-18 02:21:21', '2021-10-18 04:24:22'],

                [3101, 50, 3100, '2', 0, 'Admit Card', '', '', '', 1, 1, 1, 1, '2021-10-18 02:21:21', '2021-10-18 04:24:22'],
                [3102, 50, 3101, '3', 0, 'Setting', 'admit', 'admit', '', 1, 1, 1, 1, '2021-10-18 02:21:21', '2021-10-18 04:24:22'],
                [3103, 50, 3101, '3', 0, 'Generate', '', '', '', 1, 1, 1, 1, '2021-10-18 02:21:21', '2021-10-18 04:24:22'],
                [3104, 50, 3101, '3', 0, 'Save', '', '', '', 1, 1, 1, 1, '2021-10-18 02:21:21', '2021-10-18 04:24:22'],

                [3105, 50, 3100, '2', 0, 'Seat Plan', 'seatplan', 'seatplan', '', 1, 1, 1, 1, '2021-10-18 02:21:21', '2021-10-18 04:24:22'],
                [3106, 50, 3105, '3', 0, 'Seat Plan Setting', '', '', '', 1, 1, 1, 1, '2021-10-18 02:21:21', '2021-10-18 04:24:22'],
                [3107, 50, 3105, '3', 0, 'Generate', '', '', '', 1, 1, 1, 1, '2021-10-18 02:21:21', '2021-10-18 04:24:22'],
            ];
            foreach ($leadTrioModuleIds as $leadTrioModuleId) {
                $check_exit = TrioModuleInfo::find($leadTrioModuleId[0]);
                if ($check_exit) {
                    continue;
                }

                $examPlan = new TrioModuleInfo;
                $examPlan->id = $leadTrioModuleId[0];
                $examPlan->module_id = $leadTrioModuleId[1];
                $examPlan->parent_id = $leadTrioModuleId[2];
                $examPlan->type = $leadTrioModuleId[3];
                $examPlan->is_saas = $leadTrioModuleId[4];
                $examPlan->name = $leadTrioModuleId[5];
                $examPlan->route = $leadTrioModuleId[6];
                $examPlan->lang_name = $leadTrioModuleId[7];
                $examPlan->icon_class = $leadTrioModuleId[8];
                $examPlan->active_status = $leadTrioModuleId[9];
                $examPlan->created_by = $leadTrioModuleId[10];
                $examPlan->updated_by = $leadTrioModuleId[11];
                $examPlan->school_id = $leadTrioModuleId[12];
                $examPlan->created_at = $leadTrioModuleId[13];
                $examPlan->updated_at = $leadTrioModuleId[14];
                $examPlan->save();
            }

            $admins = [3100, 3101, 3102, 3103, 3104, 3105, 3106, 3107];
            foreach ($admins as $admin) {
                $admins_check = TrioPermissionAssign::where('module_id', $admin)->where('role_id', 5)->first();
                $permission = new TrioPermissionAssign();
                $permission->module_id = (int) $admin;
                $permission->module_info = TrioModuleInfo::find($admin) ? TrioModuleInfo::find($admin)->name : '';
                $permission->role_id = 5;

                if ($admins_check) {
                    continue;
                }

                $permission->save();
            }

            $trio_module_student_parent_infos = [
                [2500, 50, 0, '1', 'ExamPlan', '', 'ExamPlan', 'flaticon-test', 1, 1, 1, 1, '2019-07-25 02:21:21', '2019-07-25 04:24:22'],
                [2501, 50, 2500, '2', 'Admit Card', 'admit/card', 'Admit Card', 'chat_box', '', 1, 1, 1, 1, '2019-07-25 02:21:21', '2019-07-25 04:24:22'],
                [2502, 50, 0, '1', 'ExamPlan', '', 'ExamPlan', 'flaticon-test', 1, 1, 1, 1, '2019-07-25 02:21:21', '2019-07-25 04:24:22'],
                [2503, 50, 2502, '2', 'Admit Card', 'admit/card', 'Admit Card', 'chat_box', '', 1, 1, 1, 1, '2019-07-25 02:21:21', '2019-07-25 04:24:22'],
            ];
            foreach ($trio_module_student_parent_infos as $trio_module_student_parent_info) {
                $check_exit = TrioModuleStudentParentInfo::find($trio_module_student_parent_info[0]);
                if ($check_exit) {
                    continue;
                }

                $examPlan = new TrioModuleStudentParentInfo;
                $examPlan->id = $trio_module_student_parent_info[0];
                $examPlan->module_id = $trio_module_student_parent_info[1];
                $examPlan->parent_id = $trio_module_student_parent_info[2];
                $examPlan->type = $trio_module_student_parent_info[3];
                $examPlan->name = $trio_module_student_parent_info[4];
                $examPlan->route = $trio_module_student_parent_info[5];
                $examPlan->lang_name = $trio_module_student_parent_info[6];
                $examPlan->icon_class = $trio_module_student_parent_info[7];
                $examPlan->active_status = 1;
                $examPlan->created_by = 1;
                $examPlan->updated_by = 1;
                $examPlan->school_id = 1;
                $examPlan->save();
            }

            $schools = App\SmSchool::all();
            foreach ($schools as $school) {
                $schoolModule = SchoolModule::where('school_id', $school->id)->first();
                if ($school->id !== 1 && $schoolModule) {
                    $plan = ['ExamPlan'];
                    if ($schoolModule->modules) {
                        $plan = array_merge($plan, $schoolModule->modules ?? []);
                    }

                    $schoolModule->update(['modules' => $plan]);
                }
            }
        } catch (Throwable $throwable) {
            Log::info($throwable);
        }

    }

    public function down(): void
    {
        Schema::dropIfExists('admit_card_settings');
    }
}
