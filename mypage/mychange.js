const mycheck = () => {
  const userpw = document.regiform.userpw;
  const newpw = document.regiform.newpw;
  const curpw = document.regiform.curpw;
  const username = document.regiform.username;
  const userphone = document.regiform.userphone;
  const useremail = document.regiform.useremail;

  // username값이 비어있으면 실행.
  if (username.value == "") {
    alert("이름을 입력해주세요.");
    username.focus();
    return false;
  }
  if (username.value.length > 10) {
    alert("이름은 10글자 이하로 입력해주세요.");
    username.focus();
    return false;
  }
  // 한글 이름 형식 정규식
  const expNameText = /[가-힣a-zA-Z]+$/;
  // username값이 정규식에 부합한지 체크
  if (!expNameText.test(username.value)) {
    alert("이름 형식이 맞지않습니다. 형식에 맞게 입력해주세요.");
    username.focus();
    return false;
  }
  // useremail값이 비어있으면 알림창을 띄우고 input에 포커스를 맞춘 뒤 False를 리턴한다.
  if (useremail.value == "") {
    alert("이메일을 입력해주세요.");
    useremail.focus();
    return false;
  }
  // 이메일 형식 정규식
  const expEmailText = /^[A-Za-z0-9\.\-]+@[A-Za-z0-9\.\-]+\.[A-Za-z0-9\.\-]+$/;
  // useremail값이 정규식에 부합한지 체크
  if (!expEmailText.test(useremail.value)) {
    alert("이메일 형식이 맞지 않습니다.");
    useremail.focus();
    return false;
  }
  // userphone값이 비어있으면 실행.
  if (userphone.value == "") {
    alert("핸드폰 번호를 입력해주세요.");
    userphone.focus();
    return false;
  }
  // 핸드폰 번호 형식 정규식
  const expHpText = /^\d{3}\d{3,4}\d{4}$/;
  // userphone값이 정규식에 부합한지 체크
  if (!expHpText.test(userphone.value)) {
    alert("핸드폰 번호 형식이 맞지않습니다.");
    userphone.focus();
    return false;
  }
  if (newpw.value != "") {
    if (newpw.value.length < 3 || newpw.value.length > 20) {
      alert("변경하실 비밀번호는 3자 이상 20자 이하로 입력해주세요.");
      newpw.focus();
      return false;
    }
  }
  // userpw값이 비어있으면 실행.
  if (curpw.value == "") {
    alert("현재 비밀번호를 입력해주세요.");
    curpw.focus();
    return false;
  }
  // userpw값이 6자 이상 20자 이하를 벗어나면 실행.
  if (userpw.value.length < 3 || userpw.value.length > 20) {
    alert("비밀번호는 3자 이상 20자 이하로 입력해주세요.");
    userpw.focus();
    return false;
  }

  return true;
};
