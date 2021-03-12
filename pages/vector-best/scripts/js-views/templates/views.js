export let jsv_item_list = function (medicalDevice) {

    return `<article class="product-row">
    <details class="details">
        <summary class="divice-header">${medicalDevice["register_id_uniq"]}</summary>
        <div class="item-content">
            Регистарционное удостоверение ${medicalDevice["registration_certificate"] || "$(^_^)$"}  
            <a href="${medicalDevice["href_registration_certificate"]}">Скачать</a> 
            <br>
            <span class="title">Название</span> ${medicalDevice["device_name"]}
            <br>
        </div>
    </details>
</article>
<hr>`

}





