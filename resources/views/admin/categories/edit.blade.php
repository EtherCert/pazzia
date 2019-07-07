@extends('layout.admin')
@section('title','Edit category')
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
               <h4 style="padding-left: 10px"><i class="fa fa-angle-right"></i> Edit Category</h4>
               <div class="form-panel">
                    <div class=" form">
                         <form method="post" action="{{route('admin.categories.update' ,['id'=>$category->id])}}">
                              @csrf
                              @method('PUT')

                              <div class="form-group">
                                   <label class="control-lable">Category</label>
                                   <div>
                                        <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" value="{{$category->name}}">
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