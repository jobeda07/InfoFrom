<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <title>Info Form</title>
</head>

<body>
  @if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="container">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-7">

        <h3 class="pt-2 pb-2 text-center">Data form</h3>


        <!--Create form  -->
        @if (!isset($Editdata))
        <form action="{{route('FormStore')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row g-5 ">
            <div class="col-auto">
              <label class="col-form-label" style="padding-right: 45px; font-size:20px;">Name</label>
            </div>
            <div class="col-auto">
              <input type="text" name="name" style="width:450px !important" id="" class="form-control">
            </div>

          </div>
          @error('name')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <div class="row g-5 ">
            <div class="col-auto">
              <label class="col-form-label" style="padding-right: 45px; font-size:20px;">Email</label>
            </div>

            <div class="col-auto">
              <input type="email" name="email" style="width:455px !important;padding-left:5px !important" id="" class="form-control mt-2">
            </div>
            @error('email')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="row g-5 ">
            <div class="col-auto">
              <label class="col-form-label" style="padding-right: 45px; font-size:20px;">Image</label>
            </div>
            <div class="col-auto">
              <input type="file" name="image" style="width:450px !important" class="form-control mt-2">
            </div>
          </div>
          <div class="row g-5">
            <div class="col-auto">
              <label class="col-form-label" style="padding-right: 45px; font-size:20px;">Gender</label>
            </div>
            <div class="col-auto pt-3 pb-3">
              <div class="form-check">
                <input type="radio" class="form-check-input" id="radio1" name="gender" value="male">Male
                <label class="form-check-label" for="radio1"></label>
              </div>
              <div class="form-check">
                <input type="radio" class="form-check-input" id="radio2" name="gender" value="female">Female
                <label class="form-check-label" for="radio2"></label>
              </div>
            </div>
          </div>

          @error('gender')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
      </div>
      <div class="row g-5 " style="margin-top:-30px">
        <div class="col-auto">
          <label class="col-form-label" style="padding-right: 100px; font-size:20px; padding-left: 180px;">Skills</label>
        </div>
        <div class="col-auto">
          <div class="row g-5">
            <div class="col-auto">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="skill[]" value="Laravel">
                <label class="form-check-label">
                  Laravel
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="skill[]" value="Ajax">
                <label class="form-check-label">
                  Ajax
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="skill[]" value="MySQL">
                <label class="form-check-label">
                  MySQL
                </label>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="skill[]" value="Codigniter" id="flexCheckDefault">
                <label class="form-check-label">
                  Codigniter
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="skill[]" value="VueJs">
                <label class="form-check-label">
                  Vue JS
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="skill[]" value="API">
                <label class="form-check-label">
                  API
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary mt-5  ">Submit</button>

      </div>
      </form>
      <!--Edit form  -->
      @else


      <form action="{{route('UpdateForm',$Editdata->id)}}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="row g-5 ">
          <div class="col-auto">
            <label class="col-form-label" style="padding-right: 45px; font-size:20px;">Name</label>
          </div>
          <div class="col-auto">
            <input type="text" name="name" value="{{$Editdata->name}}" style="width:450px !important" id="" class="form-control">
          </div>
        </div>
        <div class="row g-5 ">
          <div class="col-auto">
            <label class="col-form-label" style="padding-right: 45px; font-size:20px;">Email</label>
          </div>
          <div class="col-auto">
            <input type="email" name="email" value="{{$Editdata->email}}" style="width:455px !important;padding-left:5px !important" id="" class="form-control mt-2">
          </div>
        </div>
        <div class="row g-5 ">
          <div class="col-auto">
            <label class="col-form-label" style="padding-right: 45px; font-size:20px;">Image</label>
          </div>
          <div class="col-auto">
            <input type="file" name="image" style="width:450px !important" class="form-control mt-2">
            <img width="70px" height="70px" class="rounded-circle shadow-4-strong" src="{{url('/uploads/infopicture/'.$Editdata->image)}}" alt="img not found">
          </div>
        </div>
        <div class="row g-5">
          <div class="col-auto">
            <label class="col-form-label" style="padding-right: 45px; font-size:20px;">Gender</label>
          </div>
          <div class="col-auto pt-3">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" {{($Editdata->gender == 'male') ? 'checked' : '' }}>
              <label class="form-check-label" for="inlineRadio1">male</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" value="female" {{($Editdata->gender == 'female') ? 'checked' : '' }}>
              <label class="form-check-label" for="inlineRadio2">female</label>
            </div>
          </div>
        </div>
        <div class="row g-5 ">
          <div class="col-auto">
            <label class="col-form-label" style="padding-right: 45px; font-size:20px;">Skills</label>
          </div>
          <div class="col-auto">
            <div class="row g-5">
              <div class="col-auto">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="skill[]" value="Laravel" {{ (in_array('Laravel', json_decode($Editdata->skill))) ? 'checked' : '' }}>

                  <label class="form-check-label">
                    Laravel
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="skill[]" value="Ajax" {{ (in_array('Ajax', json_decode($Editdata->skill))) ? 'checked' : '' }}>
                  <label class="form-check-label">
                    Ajax
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="skill[]" value="MySQL" {{ (in_array('MySQL', json_decode($Editdata->skill))) ? 'checked' : '' }}>
                  <label class="form-check-label">
                    MySQL
                  </label>
                </div>
              </div>
              <div class="col-auto">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="skill[]" value="Codigniter" {{ (in_array('Codigniter', json_decode($Editdata->skill))) ? 'checked' : '' }}>
                  <label class="form-check-label">
                    Codigniter
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="skill[]" value="VueJs" {{ (in_array('VueJs', json_decode($Editdata->skill))) ? 'checked' : '' }}>
                  <label class="form-check-label">
                    Vue JS
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="skill[]" value="API" {{ (in_array('API', json_decode($Editdata->skill))) ? 'checked' : '' }}>
                  <label class="form-check-label">
                    API
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary mt-5  ">Submit</button>

        </div>
      </form>
      @endif

    </div>
    <div class="col-lg-3"></div>
    <div class="row">
      <div class="col-1"></div>
      <div class="col-10">
        <hr>
        <h4 class="pt-2 pb-2 text-center">List of Data</h4>
        {{-- table  --}}
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Image</th>
              <th scope="col">Gender</th>
              <th scope="col">Skills</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($info as $data)
            <tr>
              <th scope="row">{{$data->id}}</th>
              <td>{{$data->name}}</td>
              <td>{{$data->email}}</td>
              <td><img width="70px" height="70px" class="rounded-circle shadow-4-strong" src="{{url('/uploads/infopicture/'.$data->image)}}" alt="img not found"></td>
              <td>{{$data->gender}}</td>
              <td>
                @foreach(json_decode($data->skill) as $skill)
                {{$skill}},
                @endforeach
              </td>
              <td>
                <a href="{{route('EditForm',$data->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
              </td>



              <div class="modal fade" id="deleteModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="get" action="{{route('DeleteForm',$data->id)}}">
                      <div class="modal-body">
                        Are you to Delete ?</div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes</button>
                        <button type="submit" class="btn btn-primary">No</button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
              <td><a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$data->id}}" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-1"></div>
    </div>
  </div>
  </div>







  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
</body>

</html>