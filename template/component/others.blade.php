<form method="post"  action="{{ route('admin.waba.others.store',['template'=>$templateId]) }}">
    @csrf
    <div class="row filter_box">
        <div class="mb-3 col-12">
            <label class="form-check-label mb-2">{{__('form.ChooseUsers')}} <span
                    class="text-danger">*</span></label>
            <select class="form-select" id="send_to" name="send_to">
                <option value="all_students">{{__('form.AllStudents')}}</option>
                <option value="subscribed">{{__('form.SubscribedStudents')}}</option>
                <option value="not_subscribed">{{__('form.NotSubscribedStudents')}}</option>
                <option value="not_active">{{__('form.NotActiveStudents')}}</option>
                <option value="tutors">{{__('form.AllTutors')}}</option>
                <option value="active_tutors">{{__('form.ActiveTutors')}}</option>
                <option value="not_active_tutors">{{__('form.NotActiveTutors')}}</option>
                <option value="subscriptions">{{__('form.SubscribedToCourse')}}</option>
                <option value="group">{{__('form.SubscribedToAGroup')}}</option>
                <option value="custom_users">{{__('form.CustomUsers')}}</option>
                <option value="outside_users">{{__('form.OutsideUsers')}}</option>
                {{--                            <option value="trial_confirmed">{{__('form.RequestedTrial')}}</option>--}}
            </select>
        </div>
    </div>
    <div class="row mt-3 box_container_main" id="customEmailContainer">
        <div class="col-12 d-none form-group" id="subscriptionsContainer">
            <div class="form-group mb-3">
                <label class="form-check-label mb-2">{{__('form.Courses')}} <span class="text-danger">*</span></label>
                <select class="col-auto form-control js-example-basic-multiple" name="subscriptions[]" style="width: 100%;" multiple="multiple">
                    <option value="">{{__('form.SelectCourse')}}</option>
                    @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row d-none" id="groupsContainer">
            <div class="mb-3 col-md-6">
                <label class="form-check-label mb-2">{{__('form.Courses')}}
                    <span class="text-danger">*</span></label>
                <select class="form-control" name="coursesHasGroups" style="width: 100%;">
                    <option value="">{{__('form.SelectCourse')}}</option>
                    @foreach($coursesHasGroups as $course)
                        <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-check-label mb-2">{{ __('form.Group') }}
                    <span class="text-danger">*</span>
                </label>
                <select class="form-select" name="group">
                </select>
            </div>
        </div>

        <div class="col-12 d-none form-group mb-3" id="phonesContainer">
            <div class="form-group">
                <label class="form-check-label mb-2">{{__('form.phone')}}
                    <span class="text-danger">*</span>
                </label>
                <select class="col-auto form-control js-example-basic-multiple"
                        name="phones[]" style="width: 100%;" multiple="">
                </select>
            </div>
        </div>

    </div>
    <div class="card-footer main_footer py-0 d-flex align-items-center gap-3 pb-3 justify-content-center">
        <button class="btn btn_blue   btn_effect col-6" type="submit">{{__('buttons.Send')}}</button>
    </div>
</form>
