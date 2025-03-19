<x-myheader></x-myheader>


<h2>{{$variable2}}</h2>

<table class="table table-hover">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>

      @foreach($allUsers as $user)



      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
      </tr>

      @endforeach
   
    </tbody>
  </table>
</div>

</body>
</html>
