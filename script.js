// ⏰ Live Date Time
function updateTime(){
    let now=new Date();
    document.getElementById("datetime").innerText =
        now.toLocaleDateString()+" | "+now.toLocaleTimeString();
}
setInterval(updateTime,1000);

// 🔍 Search
function searchProduct(){
    let input=document.getElementById("search").value.toLowerCase();
    let rows=document.querySelectorAll("tbody tr");

    rows.forEach(row=>{
        row.style.display=row.innerText.toLowerCase().includes(input)?"":"none";
    });
}

// ✅ Validation
function validateForm(){
    let f=document.forms["productForm"];
    if(f["name"].value==""||f["price"].value==""||f["quantity"].value==""){
        alert("Fill all fields");
        return false;
    }
    return true;
}

// ⚡ Total
function calculateTotal(){
    let p=document.getElementById("price").value;
    let q=document.getElementById("quantity").value;
    document.getElementById("total").innerText=p*q||0;
}

// ❌ Delete confirm
function confirmDelete(){
    return confirm("Delete?");
}

// 🔝 Scroll
function scrollToTop(){
    window.scrollTo({top:0,behavior:"smooth"});
}