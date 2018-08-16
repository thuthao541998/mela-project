$(document).ready(function() {

    //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
    $("#create-form").validate({
        rules: {                                         //product
            name: {
                required: true,
                minlength: 2,
                maxLength: 100
            },
            price: {
                required: true,
                minlength: 2
            },
            images: {
                required: true,
                minlength: 2
            },
            productId: {                                 //oder_detail
                required: true,
                minlength: 2
            },
            orderId: {
                required: true,
                minlength: 2
            },
            quantity: {
                required: true
            },
            unitprice: {
                required: true,
                minlength: 2
            },
            clientId: {                                    //oder
                required: true,
                minlength: 2
            },
            total: {
                required: true,
                minlength: 2
            },
            description: {                                      //category
                required: true,
                minlength: 2,
                maxLength: 100
            },
            title: {
                required: true,
                minlength: 2
            },
            author: {
                required: true,
                minlength: 2
            },
            content: {
                required: true,
                minlength: 2
            },
            id: {
                required: true,
                minlength: 2
            }
        },
        messages: {
            name: {
                required: "Vui lòng nhập tên.",
                minlength: "Tên quá ngắn vậy, chém gió ah?",
                maxLength: "Tên dài quá"
            },
            price: {
                required: "Vui lòng nhập giá.",
                minlength: "Rẻ thê đi cho đi chứ bán làm gì ?",
                integrity: true
            },
            productId: {
                required: "Vui lòng nhập productId",
                minlength: "ProductId quá ngắn vậy, tập đếm số à ?"
            },
            orderId: {
                required: "Vui lòng nhập orderId",
                minlength: "OrderId quá ngắn vậy, tập đếm số à ?"
            },
            quantity: {
                required: "Vui lòng nhập quantity"
            },
            unitprice: {
                required: "Vui lòng nhập unitprice",
                minlength: "Unitprice quá ngắn vậy, Rẻ thê đi cho đi chứ bán làm gì ?"
            },
            clientId: {
                required: "Vui lòng nhập clientId",
                minlength: "ClientId quá ngắn vậy, tập đếm số à ?"
            },
            total: {
                required: "Vui lòng nhập total",
                minlength: "Total quá ngắn vậy, chém gió gì đó thêm đi"
            },
            description: {
                required: "Vui lòng nhập description",
                minlength: "Description quá ngắn vậy, hàng Hóa chất à ?",
                maxLength: "Description quá dài so với quy định"
            },
            title: {
                required: "Vui lòng nhập title",
                minlength: "Title quá ngắn vậy, chém gió thêm đi !"
            },
            author: {
                required: "Vui lòng nhập author",
                minlength: "Author quá ngắn vậy, chém gió ah?"
            },
            content: {
                required: "Vui lòng nhập content",
                minlength: "Content quá ngắn vậy, chém gió ah?"
            },
            id: {
                required: "Vui lòng nhập id",
                minlength: "Content quá ngắn vậy, chém gió ah?"
            }
        }
    });
});