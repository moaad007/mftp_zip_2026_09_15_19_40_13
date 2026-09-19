<form method="post"  action="{{ route('admin.waba.bookingConfirmation.store',['template'=>$templateId]) }}">
    @csrf
    <div class="row">
        <div class="col-6 form-group mb-3" >
            <div class="form-group">
                <label class="form-check-label mb-2">{{__('form.phone')}}
                    <span class="text-danger">*</span>
                </label>
                <select class="col-auto form-control js-example-basic-multiple"
                        name="tryouts[]" style="width: 100%;" multiple="">
                    @foreach($tryouts as $tryout)
                        <option value="{{$tryout->id}}">{{$tryout->name . $tryout->phone}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 col-md-6 form-group ">
            <label for="link" class="pb-2">{{ __('form.Link') }} <span
                    class="text-danger">*</span></label>
            <input type="text" class="form-control" id="link" name="link"
                   placeholder="{{ __('enter a valid link') }}" autofocus="">
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-6">
            <label class="form-check-label mb-2">{{__('form.Day')}} <span
                    class="text-danger">*</span></label>
            <select class="form-select" name="day_of_week">
                @foreach($days as $day)
                    <option value="{{$day['id']}}">{{$day['day']}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-6">
            <label class="form-check-label mb-2">{{__('form.Time')}} <span
                    class="text-danger">*</span></label>
            <select class="form-select" name="time">
                @foreach(\App\Services\Constantes::HOURSAMPM as $hour)
                    <option value="{{$hour}}">{{$hour}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="card-footer main_footer py-0 d-flex align-items-center gap-3 pb-3 justify-content-center">
        <button class="btn btn_blue   btn_effect col-6" type="submit">{{__('buttons.Send')}}</button>
    </div>
</form>
