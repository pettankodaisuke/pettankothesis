@extends('ver2.dashboard.layout.layout')
@section('content')
<div class="container text-center">
  <div class="headerpage text-left">
  	<p><i class="fa fa-calendar" aria-hidden="true"></i>{{$page}}</p>
  </div>
  <div class="Listofdetail">
  	 <div class="table">
      <table class="table table-bordered table-striped table-hovered" style="width:100%" id="myTable">
         <tr>
            <th class="text-center">Device name</th>
            <th class="text-center">LogType</th>
            <th class="text-center">EntryType</th>
            <th class="text-center">EventID</th>
            <th class="text-center">Details</th>
            <th class="text-center">Date / Time</th>
         </tr>
         @foreach($_comp as $comp)
         <tr class="">
            <td class="text-center"> {{$comp->name}} </td>
            <td class="text-center"> {{$comp->logType}}</td>
            <td class="text-center"> {{$comp->entryType}}</td>
            <td class="text-center"> {{$comp->eventid}}</td>
            <td class="text-center"> {{$comp->message}}</td>
            <td class="text-center"> {{date('Y-m-d g:i:s A',strtotime($comp->created_at))}} </td>
         </tr>
         @endforeach
      </table>
   </div>
  </div>
</div>

@endsection