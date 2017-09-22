<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <div class="Listofdetail">
  	 <div class="table">
      <table class="table table-bordered table-striped table-hovered" style="width:100%" id="myTable">
         <tr>
            <th class="text-center">Device name</th>
            <th class="text-center">CPU</th>
            <th class="text-center">Memory</th>
            <th class="text-center">Total HDD</th>
            <th class="text-center">Free HDD</th>
            <th class="text-center">Used HDD</th>
            <th class="text-center">Date / Time</th>
         </tr>
         @foreach($_comp as $comp)
         <tr class="">
            <td class="text-center"> {{$comp->name}} </td>
            <td class="text-center"> {{$comp->cpu}}</td>
            <td class="text-center"> {{$comp->memory}} %</td>
            <td class="text-center"> {{$comp->hdd}} Bytes</td>
            <td class="text-center"> {{$comp->hdd_free}} Bytes</td>
            <td class="text-center"> {{$comp->hdd_used}} Bytes</td>
            <td class="text-center"> {{date('Y-m-d g:i:s A',strtotime($comp->created_at))}} </td>
         </tr>
         @endforeach
      </table>
   </div>
  </div>
    <div class="Listofdetail">
     <div class="table">
      <table class="table table-bordered table-striped table-hovered" style="width:100%" id="myTable">
         <tr>
            <th class="text-center">Device name</th>
            <th class="text-center">logType</th>
            <th class="text-center">entryType</th>
            <th class="text-center">eventid</th>
            <th class="text-center">messagee</th>
            <th class="text-center">Date / Time</th>
         </tr>
         @foreach($_evt as $comp)
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
</body>
</html>