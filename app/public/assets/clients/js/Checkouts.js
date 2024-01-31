const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const select_districts =$(".select-districts");
const select_provinces=$(".select-provinces");
select_provinces.addEventListener("change", function(e){
    const id=this.value;
    const formData=new FormData();
    formData.append("id",id);
    axios.post("checkouts/dataDistricts",formData)
    .then((result) => {
        displayDistrict(result.data)  
    })
    
})
//quận huyện
function displayDistrict(data) {
    let htmls=`<option value="#" selected style="display:none;">Chọn Quận/Huyện</option>`;
    data.forEach(item=>{
        htmls+=`<option value="${item.code}">${item.full_name}</option>`;
    })
    select_districts.innerHTML = htmls;
}
//xã phường

function displayWards(data){
    const  select_wards=$(".select-wards");
   
    let htmls=`<option value="#" selected style="display:none;">Chọn Xã/Phường</option>`;
    data.forEach(item=>{
        htmls+=`<option value="${item.code}">${item.full_name}</option>`;
    })
    select_wards.innerHTML= htmls;
}

select_districts.addEventListener('change',function() { 
    const code  =this.value;
    const formData=new FormData();
    formData.append("code",code);
    axios.post("checkouts/dataWards",formData)
    .then((result) => {
        displayWards(result.data)
    })
 })