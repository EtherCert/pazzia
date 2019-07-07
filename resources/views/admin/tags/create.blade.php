@extends('layout.admin')
@section('title','create tag')
@section('content')
<section class="wrapper">
     @if (count($errors)>0)
     <div class="alert alert-danger">
          <ul>
               @foreach($errors->all() as $error)
               <li>{{$error}}</li>
               @endforeach
          </ul>
     </div>
     @endif
     <div class="row mt">
          <div class="col-lg-12">
               <h4 style="padding-left: 10px"><i class="fa fa-angle-right"></i> New Tag</h4>
               <div class="form-panel">
                    <div class=" form">
                         <form method="post" action="{{route('admin.tags.store')}}">
                              @csrf

                              <div class="form-group">
                                   <label class="control-lable">Tag</label>
                                   <div>
                                        <input type="text" name="name" value="{{old('name')}}" class="form-control  @error('name') is-invalid @enderror">
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                   </div>
                              </div>
                              <button type="submit" class="btn btn-theme">Save</button>

                         </form>
                    </div>
               </div>
          </div>
     </div>
</section>
@endsection