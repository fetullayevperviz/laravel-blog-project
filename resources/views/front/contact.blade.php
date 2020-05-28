@extends("front.leyauts.master")
@section("title","ƏLAQƏ")
@section('bg','https://bgtagrotech.com/wp-content/uploads/2017/05/Contact-Us1.jpg')
@section("content") 
<div class="col lg-7 col-md-7">
       @if(session('success'))
          <div class="alert alert-success">
             {{session('success')}}
          </div>
       @endif
       @if($errors->any())
          <div class="alert alert-danger">
             <ul>
                 @foreach($errors->all() as $error)
                   <li>{{$error}}</li>
                 @endforeach
             </ul>
          </div>
       @endif
        <p class="font-weight-bold" style="margin-left:350px;">Bizə yazın</p>
        <form method="post" action="{{route('contact.post')}}">
            @csrf
          <div class="control-group">
            <div class="form-group controls">
              <label>Ad soyad</label>
              <input type="text" class="form-control" value="{{old('fullname')}}" placeholder="ad soyadınızı yazın" name="fullname" required>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group controls">
              <label>Email</label>
              <input type="email" class="form-control" value="{{old('email')}}" placeholder="email adresinizi yazın" name="email" required>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 controls">
              <label>Mövzu</label>
              <select name="subject" class="form-control">
                  <option value>Seçin</option>
                  <option value="Məlumat" @if(old('subject')=='Məlumat') selected @endif>Məlumat</option>
                  <option value="Dəstək" @if(old('subject')=='Dəstək') selected @endif>Dəstək</option>
                  <option value="Ümumi" @if(old('subject')=='Ümumi') selected @endif>Ümumi</option>
              </select>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group controls">
              <label>Mesajınız</label>
              <textarea rows="5" class="form-control" placeholder="mesajınızı yazın" name="message" required>{{old('message')}}</textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary float-right">Göndər</button>
          </div>
        </form>
      </div>
      <div class="col-lg-5 col-md-5">
        <p style="margin-top:50px;">
        <ul class="list-group">
            <li class="list-group-item active text-center">Bizimlə Əlaqə</li>
            <li class="list-group-item">Ünvan </li>
            <li class="list-group-item">Telefon</li>
            <li class="list-group-item">Email</li>
        </ul>
        </p>
     </div>
@endsection
 

    





