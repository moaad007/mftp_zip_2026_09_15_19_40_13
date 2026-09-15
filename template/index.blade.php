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
            const templatesContainer=$("#templates-container");
            $('select[name=template]').on('change', function () {
                const obj=JSON.parse($(this).val());
                console.log(obj.name);
                if(obj.name=="followup"||obj.name=="review"||obj.name=="test_followup"){
                    $.ajax({
                        type: "GET",
                        url: `/admin/waba/followup/${obj.id}`,
                        success: function (response) {
                            templatesContainer.html(response);
                        }
                    })
                }else if(obj.name=="teacher_availability_2"){
                    $.ajax({
                        type: "GET",
                        url: `/admin/waba/teacherAvailability/${obj.id}`,
                        success: function (response) {
                            templatesContainer.html(response);
                            $('.js-example-basic-single').select2({
                            });
                        }
                    })
                }else if(obj.name=="placement_test_3"){
                    $.ajax({
                        type: "GET",
                        url: `/admin/waba/placementTest/${obj.id}`,
                        success: function (response) {
                            templatesContainer.html(response);
                            $('.js-example-basic-single').select2({
                            });
                        }
                    })
                }else{
                    // templatesContainer.html("");
                    $.ajax({
                        type: "GET",
                        url: `/admin/waba/others/${obj.id}`,
                        success: function (response) {
                            templatesContainer.html(response);
                            $('.js-example-basic-multiple').select2({
                                tags: true
                            });
                        }
                    })
                }
            })




            $(document).on('change','#send_to', function () {
                const phonesContainer = $("#phonesContainer");
                const subscriptionsContainer = $("#subscriptionsContainer");
                const groupsContainer = $("#groupsContainer");
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
        });
        $(function(){
            $(".download").on('click',function (e){
                e.preventDefault();
                let link=$(this).data('link');
                let totalPages=Math.ceil($(this).data('total-pages'));
                for(let i=0;i<totalPages;i++){
                    window.open(link+"&page="+i,'_blank');
                }
            })
        });
    </script>


@endsection
@section('content')
    {{App::setLocale(Auth::user()->lang)}}
    <div class="card card-primary">
        <h1 class="header_cards card-header  py-0 d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div class="text-white">
                {{__('waba.sendCustomMessage')}}
            </div>
            <a href="{{route('admin.waba.getTemplates')}}"
               class="btn btn_effect btn_blue btn_orange d-flex align-items-center gap-2 ">
                {{__('waba.fetchTemplates')}}
            </a>
        </h1>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label>{{ __('waba.Templates') }} <span class="text-danger">*</span></label>
                    <select id="template" name="template" class="form-select">
                        <option value="" selected></option>
                        @foreach($templates as $template)
                            <option value="{{json_encode(['name'=>$template->name,'language'=>$template->language,'id'=>$template->id])}}" >{{ $template->name  }} ({{$template->status}}) ({{$template->language}})</option>
                        @endforeach
                    </select>
                </div>

                <div id="templates-container">
                </div>
            </div>
    </div>

  {{--  <button data-total-pages="{{\App\Models\Tryout::where('status','!=','no whatsApp')->count()/300}}" data-link="{{route('admin.waba.sendFollowupToAllTrials',['maxInPage'=>300])}}"
            class="btn btn_effect btn_blue btn_export_data download">
            <span class=" d-flex align-items-center gap-2 text-lowercase">
                send
            </span>
    </button>--}}
@endsection
