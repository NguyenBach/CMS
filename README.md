<h1>This is my CMS</h1>

<h3>Cách xây dựng Module</h3>
Mỗi module có một file config.xml để config 
Gồm 4 trường 
<li> name: tên module viết hoa chữ đầu tiên. Cái này quan trọng vì nó dùng chính tên này để là view namespace </li>
<li> description : mô tả  </li>
<li> version: số hiệu phiên bản </li>
<li> active: enable/disable để tắt mở module nếu để disable thì ko nạp </li>

<br/>

Trong module có các thư mục như 
<ul>
<li> Controllers: Chứa các controller <span style='color:red'>bắt buộc</span> </li>
<li> Models: Chứa các model </li>
<li> Views: Chứa các view </li>
<li> Migrations: Chứa các file migrations </li>
<li> Helper: Chứa Helper </li>

</ul> 
Có các thư mục bắt buộc như Controllers Models và Migrations còn các thư mục khác có thể có hoặc không 
<br>** Chú ý các thư mục phải có 's' ở cuối 
<br>
<br>
Các model và controller trong các module được extend từ CoreModel và CoreController vì trong hàm này viết một số hàm sử dụng chung cho tất cả model và controller tránh phải viết lại.


