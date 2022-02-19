<ol>
   
 @foreach ($admin as $ad)
     <li>{{$ad['nome']}}
         {{$ad['email']}}
    </li>
 @endforeach

</ol>