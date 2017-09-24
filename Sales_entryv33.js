//FILE WORKING ON THE TABLES        
var qtyTotal = 0;
var priceTotal = 0;

function updateForm(no){
    var product = document.getElementById("product").value;
    var price = document.getElementById("price").value;
    var qty = document.getElementById("quantity").value;
    var coupon = document.getElementById("coupon").value;

             // document.getElementById("qtyTotals").innerHTML=qtyTotal;
              
              // var price = document.getElementById("price").value; 
  if (no == '1') {           
    var amount = parseInt(price) * parseInt(qty);
    var amountToBePaid = amount - coupon;

              //amount = amount + parseInt(price);
    qtyTotal = qtyTotal + parseInt(qty);
    priceTotal = priceTotal + parseInt(amountToBePaid);
              //    document.getElementById("priceTotals").innerHTML=priceTotal;
    add(product, qty, price, amount, coupon, amountToBePaid ,qtyTotal,priceTotal);
  }
  else{
    var table = document.getElementById("results");
    if(table.rows.length <= 1) {               // limit the user from removing all the fields
        alert("Cannot Remove all the fields.");
        // break;
    }
    else{
    table.deleteRow(table.rows.length -1); 

    var amount = parseInt(price) * parseInt(qty);
    var amountToBePaid = amount - coupon;

    qtyTotal = qtyTotal - parseInt(qty);
    priceTotal = priceTotal - parseInt(amountToBePaid);

    document.getElementById("qty").value = qtyTotal;
    document.getElementById("tot").value = priceTotal;

    } 
  }
} 

function add(pt, qt, pr, at, cn, ap ,ql,pl){
  var table=document.getElementById("results");
  var row=table.insertRow(-1);
  var cell0=row.insertCell(0);
  var cell1=row.insertCell(1);
  var cell2=row.insertCell(2);
  var cell3=row.insertCell(3);
  var cell4=row.insertCell(4);
  var cell5=row.insertCell(5);
  //var cell6=row.insertCell(6);
  // var cell7=row.insertCell(4);
  cell0.innerHTML=pt;
  cell1.innerHTML=qt;
  cell2.innerHTML=pr;        
  cell3.innerHTML=at;
  cell4.innerHTML=cn;
  cell5.innerHTML=ap;
  //cell6.outerHTML="<a id='"clear"' class='"pull-right btn btn-default"' onclick='"updateForm('');"'>Delete Product</a>";

  document.getElementById("qty").value = ql;
  document.getElementById("tot").value = pl;

}

  