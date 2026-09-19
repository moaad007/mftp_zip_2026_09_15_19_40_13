<form method="post"  action="{{ route('admin.waba.teacherAvailability.store',['template'=>$templateId]) }}">
    @csrf
    <div class="row">
        <div class="form-group">
            <label class="form-check-label mb-2">{{__('form.Tutor')}} <span
                    class="text-danger">*</span></label>
            <select class="form-control mb-2  js-example-basic-single" name="user_id">
                @foreach($tutors as $tutor)
                    <option value="{{$tutor->user->id}}" {{$tryout&&$tryout->tutor&&$tryout->tutor->user_id==$tutor->user->id?'selected':''}}>{{$tutor->user->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-6">
            <label class="form-check-label mb-2">{{__('form.Day')}} <span
                    class="text-danger">*</span></label>
            <select class="form-select" name="day_of_week">
                @foreach(getDaysInCustomOrder(0) as $day)
                    <option value="{{$day['id']}}" {{$tryout&&$day['id']==$tryout->day_of_week?'selected':''}}>{{$day['day']}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-6">
            <label class="form-check-label mb-2">{{__('form.Time')}} <span
                    class="text-danger">*</span></label>
            <select class="form-select" name="time">
                @foreach(\App\Services\Constantes::HOURSAMPM as $hour)
                    <option value="{{$hour}}" {{$tryout&&$hour==$tryout->start_time?'selected':''}}>{{$hour}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="form-check-label mb-2">{{__('form.Client')}}
                <span class="text-danger">*</span>
            </label>
            <select class="form-select mb-2"
                    name="tryout_id">
                @foreach($tryouts as $item)
                    <option value="{{$item->id}}" {{$tryout&&$tryout->id==$item->id?'selected':''}}>{{$item->name . $item->phone}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="card-footer main_footer py-0 d-flex align-items-center gap-3 pb-3 justify-content-center">
        <button class="btn btn_blue   btn_effect col-6" type="submit">{{__('buttons.Send')}}</button>
    </div>
</form>
