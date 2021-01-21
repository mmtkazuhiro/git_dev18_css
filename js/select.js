// チェックボックスにチェックを入れたあと、input type="hidden"にチェックボックスのvalueを入れる
function mycheck(value) {
  	let arr1 = [];
	let check = document.form.check;

	for (let i = 0; i < check.length; i++){
		if(check[i].checked){ 
			arr1.push(check[i].value);
		}
  }
  
  let result = arr1.join("");
	document.getElementById("result").value = result;
}

// 削除する前に尋ねる
$(".del").on("click", function () {
  var select = confirm("削除してよろしいですか？");
  return select;
});



