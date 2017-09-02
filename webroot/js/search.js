function del_chk(cnt){
    ck_cnt = 0;
    //チェック件数を確認
    for(i = 0; i < cnt; i++){
        ck_id = "ck"+i;
        if(document.getElementById(ck_id).checked){
            ck_cnt += 1;
        }
    }
    if(ck_cnt === 0){
        alert("削除対象件数が0件です。削除する店舗を選んでください。");
        return false;
    }else{
        myRet = confirm("選択した店舗"+ck_cnt+"件を削除しますか？");
        if (myRet === true){
            return true;
        }else{
            return false;
        }
    }
}

