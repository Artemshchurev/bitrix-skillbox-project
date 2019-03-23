<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<section class="order-page">
    <form action="#" id="orderForm" method="post">
        <input type="hidden" name="PERSON_TYPE" value="1">
        <input type="hidden" name="PERSON_TYPE_OLD" value="1">
        <div class="block-cell">
            <h1>Заполните заявку</h1>
            <div class="form-line">
                <label>Город *</label>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:sale.location.selector.search",
                    "",
                    Array(
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CODE" => "",
                        "FILTER_BY_SITE" => "N",
                        "ID" => "",
                        "INITIALIZE_BY_GLOBAL_EVENT" => "",
                        "INPUT_NAME" => "LOCATION",
                        "JS_CALLBACK" => "",
                        "JS_CONTROL_GLOBAL_ID" => "",
                        "PROVIDE_LINK_BY" => "id",
                        "SHOW_DEFAULT_LOCATIONS" => "N",
                        "SUPPRESS_ERRORS" => "N"
                    )
                );?>
            </div>
            <div class="form-line">
                <label>Адрес *</label>
                <input type="text" placeholder="Введите адрес" name="ORDER_PROP_7">
            </div>
            <div class="form-line two-line">
                <div class="two-block">
                    <label>ФИО *</label>
                    <input type="text" placeholder="Введите ФИО" name="ORDER_PROP_1">
                </div>
            </div>
            <div class="form-line">
                <label>Контактная информация *</label>
                <input type="text" placeholder="Email" name="ORDER_PROP_2">
                <input type="text" placeholder="+7 (999) 000-00-00" name="ORDER_PROP_3">
            </div>

            <table class="price-total padding">
                <tr>
                    <th colspan="2">Итого</th>
                </tr>
                <tr>
                    <td class="title">Итог</td>
                    <td class="js_itogo_format">120 000 руб</td>
                </tr>
                <tr>
                    <td class="title">Доставка</td>
                    <td>
                        <span class="color green">Бесплатная доставка</span>
                    </td>
                </tr>
                <tr>
                    <td class="title">Стоимость заказа</td>
                    <td>
                        <span class="color blue js_itogo_format">120 000 руб</span>
                    </td>
                </tr>
            </table>
        </div>

        <div class="block-cell">

            <div class="js_delivery_block">
                <h1>Способ доставки</h1>
                <div class="form-line payment-block">

                </div>
            </div>

            <h2>Способ оплаты</h2>

            <div class="form-line payment-block">

            </div>
            <div class="form-line">
                <input type="submit" value="Оформить заказ">
            </div>
        </div>
    </form>
</section>

