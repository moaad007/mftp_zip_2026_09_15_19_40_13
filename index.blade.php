@extends('layouts.dashboard')
@section('head')
    <link href="{{asset('template/libs/select2/index.min.css')}}" rel="stylesheet" />
    <script src="{{asset('template/libs/select2/index.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('template/pages/admin/email/index.min.css')}}">
@endsection
@section('script')

    <script>
        $(function () {
            $('.js-example-basic-multiple').select2({
                tags: true
            });
            const sendTo = $('select[name="send_to"]');
            const phonesContainer = $("#phonesContainer");
            const subscriptionsContainer = $("#subscriptionsContainer");
            const groupsContainer = $("#groupsContainer");


            sendTo.on('change', function () {
                phonesContainer.addClass('d-none');
                subscriptionsContainer.addClass('d-none');
                groupsContainer.addClass('d-none');
                let sendToValue = $(this).val();
                if (sendToValue == "outside_users") {
                    const selectPhones = phonesContainer.find('select');
                    $(selectPhones).html("");
                    phonesContainer.removeClass('d-none');

                }
                if (sendToValue == "custom_users") {
                    $.ajax({
                        type: "GET",
                        url: "/admin/waba/get-phones",
                        success: function (phones) {
                            const selectPhones = phonesContainer.find('select');
                            $(selectPhones).html("");
                            $(phones).each(function (i, phone) {
                                $(selectPhones).append(`
                                <option value="${phone}">${phone}</option>
                            `);
                            })
                            phonesContainer.removeClass('d-none');
                        }
                    })
                }


                if (sendToValue == "subscriptions") {
                    subscriptionsContainer.removeClass('d-none');
                }
                if (sendToValue == "group") {
                    groupsContainer.removeClass('d-none');
                }
            });
            $('select[name=coursesHasGroups]').on('change', function () {
                let courseId = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "/admin/get-groups/" + courseId,
                    success: function (groups) {
                        const groupsContainer = $('select[name=group]');
                        $(groupsContainer).html("");
                        $(groups).each(function (i, group) {
                            $(groupsContainer).append(`
                                <option value="${group.id}">${group.label}</option>
                            `);

                        })
                    }
                })
            })
            $('select[name=template]').on('change', function () {
                const obj=JSON.parse($(this).val());
                const templateWithoutAttributes=$("#templateWithoutAttributes");
                const trial_confirmed=$("#trial_confirmed");

                templateWithoutAttributes.removeClass("d-none");
                trial_confirmed.addClass("d-none");
            })

        });

    </script>


@endsection
@section('content')
    {{App::setLocale(Auth::user()->lang)}}
    <div class="card card-primary">
        <h1 class="header_cards card-header  py-0 d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div class="text-white">
                {{__('form.sendCustomMessage')}}
            </div>
        </h1>
        <form method="post" id="sendPhoneForm" action="{{ route('admin.waba.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group mb-3">
                    <label>{{ __('form.Templates') }} <span class="text-danger">*</span></label>
                    <select id="template" name="template" class="form-select">
                        @foreach($templates as $template)
                            <option value="{{json_encode(['name'=>$template->name,'language'=>$template->language])}}" {{(old('template')==$template->name)?'selected':''}}>{{ $template->name  }} ({{$template->status}}) ({{$template->language}})</option>
                        @endforeach
                    </select>
                </div>
                <div id="templateWithoutAttributes">
                    <div class="row filter_box">
                        <div class="mb-3 col-12">
                            <label class="form-check-label mb-2">{{__('form.ChooseUsers')}} <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" name="send_to">
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
                                <label class="form-check-label mb-2">{{__('form.Phone')}}
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="col-auto form-control js-example-basic-multiple"
                                        name="phones[]" style="width: 100%;" multiple="">
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="trial_confirmed" class="d-none">
{{--                    <div class="form-group mb-3" id="attributes">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-6 form-group mb-3" >--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="form-check-label mb-2">{{__('form.Phone')}}--}}
{{--                                        <span class="text-danger">*</span>--}}
{{--                                    </label>--}}
{{--                                    <select class="col-auto form-control js-example-basic-multiple"--}}
{{--                                            name="phones[]" style="width: 100%;" multiple="">--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3 col-md-6 form-group ">--}}
{{--                                <label for="link" class="pb-2">{{ __('form.Link') }} <span--}}
{{--                                        class="text-danger">*</span></label>--}}
{{--                                <input type="text" class="form-control" id="link" name="link"--}}
{{--                                       placeholder="{{ __('form.Enter a valid link') }}" autofocus="">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="mb-3 col-6">--}}
{{--                                <label class="form-check-label mb-2">{{__('form.Day')}} <span--}}
{{--                                        class="text-danger">*</span></label>--}}
{{--                                <select class="form-select" name="day">--}}
{{--                                    @foreach($days as $day)--}}
{{--                                        <option value="{{$day['id']}}">{{$day['day']}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3 col-6">--}}
{{--                                <label class="form-check-label mb-2">{{__('form.Time')}} <span--}}
{{--                                        class="text-danger">*</span></label>--}}
{{--                                <select class="form-select" name="time">--}}
{{--                                    @foreach($hours as $hour)--}}
{{--                                        <option value="{{$hour}}">{{$hour}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="card-footer main_footer py-0 d-flex align-items-center gap-3 pb-3 justify-content-end">
                <button class="btn btn_blue   btn_effect" type="submit">{{__('buttons.Send')}}</button>
            </div>
        </form>
    </div>
@endsection

