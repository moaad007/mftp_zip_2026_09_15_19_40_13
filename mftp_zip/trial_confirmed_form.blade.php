    <div class="row">
        <div class="col-6 form-group mb-3" >
            <div class="form-group">
                <label class="form-check-label mb-2">{{__('form.Phone')}}
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
            <label for="link" class="pb-2">{{ __('form.Link') }} <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="link" name="link"
                   placeholder="{{ __('form.Enter a valid link') }}" autofocus="">
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-6">
            <label class="form-check-label mb-2">{{__('form.Day')}} <span
                    class="text-danger">*</span></label>
            <select class="form-select" name="day">
                @foreach($days as $day)
                    <option value="{{$day['id']}}">{{$day['day']}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-6">
            <label class="form-check-label mb-2">{{__('form.Time')}} <span
                    class="text-danger">*</span></label>
            <select class="form-select" name="time">
                @foreach($hours as $hour)
                    <option value="{{$hour}}">{{$hour}}</option>
                @endforeach
            </select>
        </div>
    </div>
