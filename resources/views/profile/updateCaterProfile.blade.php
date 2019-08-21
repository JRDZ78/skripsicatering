@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="/updateCaterProfile" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="caterserviceName">Catering Service Name</label>
                    <input type="text" class="form-control {{$errors->first('caterserviceName') != '' ? 'validation-error' : ''}}" id="caterserviceName" name="caterserviceName" value="{{old('caterserviceName',$cater->name)}}">
                    <div class="form-control-feedback validation-message-error">{{$errors->first('caterserviceName')}}</div>
                </div>
                <div class="form-group">
                    <label for="caterserviceDescription">Description</label>
                    <textarea class="form-control {{$errors->first('caterserviceDescription') != '' ? 'validation-error' : ''}}" id="caterserviceDescription" name="caterserviceDescription">{{old('caterserviceDescription',$cater->description)}}</textarea>
                    <div class="form-control-feedback validation-message-error">{{$errors->first('caterserviceDescription')}}</div>
                </div>
                <div class="form-group">
                    <label for="caterservicePhone">Phone Number</label>
                    <input type="text" class="form-control {{$errors->first('caterservicePhone') != '' ? 'validation-error' : ''}}" id="caterservicePhone" name="caterservicePhone" value="{{old('caterservicePhone',$cater->phone)}}">
                    <div class="form-control-feedback validation-message-error">{{$errors->first('caterservicePhone')}}</div>
                </div>
                <div class="form-group">
                    <label for="caterserviceAddress">Address</label>
                    <textarea class="form-control {{$errors->first('caterserviceAddress') != '' ? 'validation-error' : ''}}" id="caterserviceAddress" name="caterserviceAddress">{{old('caterserviceAddress',$cater->address)}}</textarea>
                    <div class="form-control-feedback validation-message-error">{{$errors->first('caterserviceAddress')}}</div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="caterserviceBanner">Banner</label>
                    <div class="controls">
                        <input type="file" id="caterserviceBanner" name="caterserviceBanner" placeholder=""
                               class="form-control {{$errors->first('caterserviceBanner') != '' ? 'validation-error' : ''}}">
                        <div
                            class=" validation-messages-error">{{$errors->first('caterserviceBanner')}}</div>
                    </div>
                </div>


                {{ csrf_field() }}

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
