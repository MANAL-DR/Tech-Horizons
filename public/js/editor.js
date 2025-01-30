function update(id){
    var td=document.getElementById('role-'+id);
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    var userid=Number(id);
    var currentRole = td.innerText.trim();
    td.innerHTML=`
        <form method="post" action="{{route('updateUser')}}">
            <input type="hidden" name="_token" value='${token}'>
            <input type='hidden' name='id' value='${userid}'>
            <select name='role' class='styled-select'>
                <option class='styled-option' value='subscriber'>subscriber</option>
                <option class='styled-option' value='theme_manager'>theme_manager</option>
            </select>
            <input class='btn' type='submit' value='confirm'>
        </form>`;
}