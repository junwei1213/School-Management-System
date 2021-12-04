<html>
<head>
<style>


body{
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  flex-direction: column;
}
h2{
  font-family: Helvetica;
  font-size:36px;
  margin-top:40px;
  color:#333;
   opacity :0;
}
h2{
  animation: .6s title ease-in-out;
  animation-dalay: 1.2s;
  animation-fill-mode: forwards;
}
.circle{
  stroke-dasharray:1194;
   stroke-dashoffset:1194;
}
.circle{
  animation:circle 1s ease-in-out;
  animation-fill-mode: forwards;
}
.tick{
  stroke-dasharray:350;
   stroke-dashoffset:350;
}
.tick{
  animation: tick .8s ease-out;
  animation-fill-mode: forwards;
  animation-dalay: .95s;
}
@keyframes circle{
  form{
    
   stroke-dashoffset:1194;
  }
  to{
    stroke-dashoffset:2388;
  }
}
@keyframes tick{
  form{
    
   stroke-dashoffset:350;
  }
  to{
    stroke-dashoffset:0;
  }
}

@keyframes title{
  form{
    
   opacity: 0;
  }
  to{
    opacity: 1;
  }
}
</style>
</head>


<body>
<h2>Attendance Taked</h2>

<svg width="400" height="400">
  <circle fill="none" stroke="#68E534" stroke-width="20" cx="200" cy="200" r="190" class="circle"  stroke-linecap="round" transform="rotate(-90 200 200)"/>
  <polyline fill="none" stroke="#68E534" stroke-width="24" points="88,214,173,284,304,138" stroke-linecap="round" stroke-linejoin="round" class="tick"/>
  </svg>
  
<?php
header("refresh:5;url=index.php");

?>
</body>


</html>