
@extends('layouts.app')
@section('content')
<div class="row col-md-9 col-lg-9 col-sm-9 pull-left">
  <h1>Create Project</h1>


      
      <!-- Example row of columns -->
      <div class="row col-md-12 col-lg-12 col-sm-12 " style="background: white; margin:10px;">
        <form method="post" action="{{ route('projects.store') }}">

          {{ csrf_field() }}

          

          <div class="form-group">
            <label for="project-name">Name<span class="required"></span></label>

            <input  placeholder="Enter name"
            id ="project-name"
            required
            name="name"
            spellcheck="false"
            class="form-control"
           />
            


          </div>
          @if($departments !=null)
             <input class="form-control" type="hidden" name="department_id"
             value=""{{ $department_id }}
             />
             @endif

             @if($departments != null)

             <div class="form-group">
              <label for="department-content">Select Department</label>
              <select name="{{ $department_id}}" class="form-control">
                @foreach($departments as $department)
                  <option value="{{ $department_id}}">{{ $department->name}}</option>
                @endforeach


              </select>
               



             </div>
             @endif

           
           <div class="form-group">
            <label for="department-content">Description</label>

            <textarea  placeholder="Enter description"
            style="resize: vertical" 
            id ="project-content"
            name="description"
            row="5" spellcheck="false"
            class="form-control autosize-target text-left">
            </textarea>
            


          </div>

          
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="submit">
              

            </div>

    



        </form>

      </div>

    </div>


    <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
         {{--  <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> --}}
           <div class="sidebar-module">
            <h4>Action</h4>
            <ol class="list-unstyled">
              <li><a href="/departments">My Department</a></li>
              
            </ol>
          </div>

         {{--  <div class="sidebar-module">
            <h4>Members</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
             
            </ol>
          </div> --}}
         
        </div>



       
    

    
      

    
    @endsection