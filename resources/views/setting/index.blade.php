@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 grid-margin">

        @if ($message = Session::get('error'))
              <div class="alert alert-warning">
                  <p>{{ $message }}</p>
              </div>
          @endif
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
          @endif

            <form action="{{ url('/admin/setting') }}" method="POST">
                @csrf

                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Website</h3>
                        <div class="card-tools">
                            <a href="{{ url('/admin/add-dev') }}" class="btn btn-sm btn-warning">
                                Add Developer
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Website Name</label>
                                <input type="text" name="website_name" value="{{ $setting->website_name ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Website URL</label>
                                <input type="text" name="website_url" value="{{ $setting->website_url ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3 d-none">
                                <label>Page Title</label>
                                <input type="text" name="page_title" value="{{ $setting->page_title ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Tentang Kami</label>
                                <textarea name="meta_keyword" class="form-control" rows="3">{{ $setting->meta_keyword ?? ''}}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Tujuan Kami</label>
                                <textarea name="meta_description" class="form-control" rows="3">{{ $setting->meta_description ?? ''}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Website - Information</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Address</label>
                                <textarea name="address" class="form-control" rows="3">{{ $setting->address ?? ''}}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone 1 *</label>
                                <input type="text" name="phone1" value="{{ $setting->phone1 ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone No. 2</label>
                                <input type="text" name="phone2" value="{{ $setting->phone2 ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email Id 1 *</label>
                                <input type="text" name="email1" value="{{ $setting->email1 ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email Id 2</label>
                                <input type="text" name="email2" value="{{ $setting->email2 ?? ''}}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Website - Social Media</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Facebook (Optional)</label>
                                <input type="text" name="facebook" value="{{ $setting->facebook ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Twitter (Optional)</label>
                                <input type="text" name="twitter" value="{{ $setting->twitter ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Instagram (Optional)</label>
                                <input type="text" name="instagram" value="{{ $setting->instagram ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Youtube (Optional)</label>
                                <input type="text" name="youtube" value="{{ $setting->youtube ?? ''}}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary text-white shadow">
                        Save Settings
                    </button>
                </div></br>

            </form>
        </div>
    </div>
</div>
@endsection