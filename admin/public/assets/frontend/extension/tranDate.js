SOUGOU_ZYANARU_MODULE.service('tranDate', function(){ 

 	this.tranDate = function(date) {
 		try {
 			if(date != undefined) {
 				var objDate = date.split(' ');
 				var objArray = objDate[0].split('-');
 				return objArray[0]+"Năm"+objArray[1]+"Tháng"+objArray[2]+"Ngày";
 			} else {
 				throw "undefined"; // 
 			}
 		}catch(err) {
 			console.log(err);
 		}
	}

 });


