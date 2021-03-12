export let jsdom_enterpise_item = function (medicalDevice) {


    document.createElement(option)

    return `<article class="product-row">
    <details open class="details">
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