function logoutCheck(){
  if(confirm("정말로 로그아웃 하시겠습니까?")){
    location.href="../users/logout.pjp";
  } else {
    return false;
  }
  
  
}