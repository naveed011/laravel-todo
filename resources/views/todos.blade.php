<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Naveed Assesment</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center mb-3">
                <h1>Assessment - Metaschool => Naveed _ Web Developer _  3+</h1>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Create Tasks</div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('store')}}" method="POST">
                            <div class="form-group">
                                <label for="task_title"></label>
                                <input type="text" class="form-control" name="task_title" >
                                <span class="text-danger">{{ $errors->first('task_title') }}</span>

                            </div>
                            @csrf
                            <div class="form-group">
                                <label for="scheduled_at"></label>
                                <input type="datetime-local" id="scheduled_at" name="scheduled_at" class="form-control"/>
                                <span class="text-danger">{{ $errors->first('scheduled_at') }}</span>
                            </div>
                            <button type="submit" class="btn btn-success" style="float:left; margin-top: 5px;">Create</button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
               @if(session()->has('success'))
                    <h4 class="alert alert-success">{{session()->get('success')}}</h4>
                @endif
               <div class="card">
                   <div class="card-header">
                       <div class="card-title">To-do list</div>
                   </div>
                   <div class="card-body table-responsive">
                       <table class="table table-striped">
                           <thead>
                           <tr>
                               <td>#</td>
                               <td>Title</td>
                               <td>Date</td>
                               <td>Day</td>
                               <td>Time</td>
                           </tr>
                           </thead>
                           <tbody>
                           @forelse($todos as $todo)
                               <tr>
                                   <td>{{$loop->iteration}}</td>
                                   <td>{{$todo->task_title}}</td>
                                   <td>{{$todo->scheduled_at->tz(session()->get('local_timezone'))->format('Y-m-d')}}</td>
                                   <td>{{$todo->scheduled_at->tz(session()->get('local_timezone'))->format('D')}}</td>
                                   <td>{{$todo->scheduled_at->tz(session()->get('local_timezone'))->format('h:i A')}}</td>
                               </tr>
                           @empty
                               <tr>
                                   <td colspan="4">No records found</td>
                               </tr>
                           @endforelse
                           </tbody>
                       </table>
                   </div>
               </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <script>
        $(function(){
            let timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            // getLocalTimeZone();
        })
        function getLocalTimeZone(){
            $.ajax({
                url:"{{route('save_timezone')}}",
                method:"POST",
                data:{timezone, _token:"{{csrf_token()}}"},
                success:function(){
                    console.log('siccess')
                },
                error:function(){
                    alert('error in getting local machine timezone')
                }
            })
        }
    </script>
</body>
</html>
