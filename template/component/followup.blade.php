<form method="post"  action="{{ route('admin.waba.followup.store',['template'=>$templateId]) }}">
    @csrf
    <div class="row">
        @if(!$group)
            <div class="col-6 form-group mb-3" >
                <div class="form-group">
                    <label class="form-check-label mb-2">{{__('form.name')}}
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="name" name="name" value="{{isset($tryout)?$tryout->name:''}}"
                           placeholder="{{ __('enter a valid name') }}" autofocus="">
                </div>
            </div>
            <div class="col-6 form-group mb-3" >
                <div class="form-group">
                    <label class="form-check-label mb-2">{{__('form.phone')}}
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{isset($tryout)?$tryout->phone:''}}"
                           placeholder="{{ __('enter a valid phone') }}" autofocus="">
                </div>
            </div>
        @else
            <input type="hidden" name="group_id" value="{{$group}}">
        @endif
    </div>

    <div class="card-footer main_footer py-0 d-flex align-items-center gap-3 pb-3 justify-content-center">
        <button class="btn btn_blue   btn_effect col-6" type="submit">{{__('buttons.Send')}}</button>
    </div>
</form>
