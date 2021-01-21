$(function(){
    // let kanri_input = document.getElementById("kanri_input").value;
    // let life_input =document.getElementById("life_input").value;
    let kanri = document.getElementsByClassName("kanri_flg");
    let life =document.getElementsByClassName("life_flg");

    // console.log(kanri_input);
    // console.log(life_input);

    for (let i = 0; i < kanri.length; i++) {
        // console.log(kanri[i].textContent);

        if(kanri[i].textContent == 1){
            kanri[i].innerHTML = "管理者";
        }else{
            kanri[i].innerHTML = "一般ユーザー";
        }

    }

    for (let i = 0; i < life.length; i++) {
        // console.log(life[i].textContent);

        if(life[i].textContent == 0){
            life[i].innerHTML = "在社";
        }else{
            life[i].innerHTML = "退社";
        }

    } 
});

$(".del_btn").on("click", function () {
    var select = confirm("削除してよろしいですか？");
    return select;
  });