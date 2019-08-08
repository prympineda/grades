@extends('layouts.teacher')

@section('content')

<h1>
    Add Written Work : {{ ucwords($section->grade_level->name) }}-{{ ucwords($section->name) }} -
    {{ ucwords($subject->title) }}</h1>
</h1>
@include('includes.success')


<form action="{{ route('post_add_written_work_score') }}" method="POST" autocomplete="off">
    <div class="form-group">
        <input type="number" name="total" max=100 min=1 onkeypress='return event.charCode >= 48 && event.charCode <= 57'
            placeholder="Total" id="total" />
    </div>
    <div class="form-group">
        <table class="table" id="studentsTable">
            <thead>
                <tr>
                    <th onclick="sortTable(0)" style="cursor: pointer;">Name</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach($studs as $std)
                <tr>
                    <td>{{ ucwords($std->user->lastname) }}, {{ ucwords($std->user->firstname) }}</td>
                    <td><input type="number" name="{{ $std->user->id }}" value="0" class="score" placeholder="Score" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="form-group">
        {{--  <input type="hidden" name="assign_id" value="{{ $assign->id }}" /> --}}
        <input type="hidden" name="section_id" value="{{ $section->id }}" />
        <input type="hidden" name="subject_id" value="{{ $subject->id }}" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button class="btn btn-primary">Save</button>
        <a href="{{ route('get_view_students_per_section', ['section_id'=> $section->id, 'subject_id' => $subject->id]) }}"
            class="btn btn-danger">Cancel</a>
    </div>
</form>

{{--  <script>
    function getMaxValueForRequest() {
          var x = document.getElementsByClassName('score');
          var currentItemAmount = parseInt(document.getElementById("total").value);
          var i;
          for(i = 0; i < x.length; i++) {
            x[i].setAttribute('max', currentItemAmount);
          }
          
        }
        
        
        
        document.getElementById("total").addEventListener('change', function(event) {
          getMaxValueForRequest()
        })
        
        
        
        
        function sortTable(n) {
          var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
          table = document.getElementById("studentsTable");
          switching = true;
          // Set the sorting direction to ascending:
          dir = "asc"; 
          /* Make a loop that will continue until
          no switching has been done: */
          while (switching) {
            // Start by saying: no switching is done:
            switching = false;
            rows = table.getElementsByTagName("TR");
            /* Loop through all table rows (except the
            first, which contains table headers): */
            for (i = 1; i < (rows.length - 1); i++) {
              // Start by saying there should be no switching:
              shouldSwitch = false;
              /* Get the two elements you want to compare,
              one from current row and one from the next: */
              x = rows[i].getElementsByTagName("TD")[n];
              y = rows[i + 1].getElementsByTagName("TD")[n];
              /* Check if the two rows should switch place,
              based on the direction, asc or desc: */
              if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                  // If so, mark as a switch and break the loop:
                  shouldSwitch= true;
                  break;
                }
              } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                  // If so, mark as a switch and break the loop:
                  shouldSwitch= true;
                  break;
                }
              }
            }
            if (shouldSwitch) {
              /* If a switch has been marked, make the switch
              and mark that a switch has been done: */
              rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
              switching = true;
              // Each time a switch is done, increase this count by 1:
              switchcount ++; 
            } else {
              /* If no switching has been done AND the direction is "asc",
              set the direction to "desc" and run the while loop again. */
              if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
              }
            }
          }
        }
        
        window.onload = function() {
          sortTable(0);
        };
</script>  --}}

@stop