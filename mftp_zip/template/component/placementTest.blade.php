<form method="post"  action="{{ route('admin.waba.placementTest.store',['template'=>$templateId]) }}">
    @csrf
    <div class="row">
        <div class="col-6 form-group mb-3" >
            <div class="form-group">
                <label class="form-check-label mb-2">{{__('form.phone')}}
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" id="phone" name="phone" value=""
                       placeholder="{{ __('enter a valid phone') }}" autofocus="">
            </div>
        </div>
    </div>

    <div class="card-footer main_footer py-0 d-flex align-items-center gap-3 pb-3 justify-content-center">
        <button class="btn btn_blue   btn_effect col-6" type="submit">{{__('buttons.Send')}}</button>
    </div>
</form>
