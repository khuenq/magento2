/**
 * Created by K-144 on 3/23/2016.
 */
var index = 0;

function updateSkuInformation(sku, qty, itemIndex) {
    var url = jQuery('#get-product-info-url').val();
    jQuery.ajax({
        url: url,
        method: "POST",
        dataType: 'json',
        data: {sku: sku, qty: qty}
    }).success(function (data) {
        if (parseInt(data.id) > 0) {
            var id = data.id;
            var name = data.name;
            var price = data.price;

            // Update information to form
            jQuery("#item-id_" + itemIndex).val(id);
            jQuery("#item-name_" + itemIndex).html(name);
            jQuery("#item-price_" + itemIndex).html(price);
            addQuickOrderItem();
        } else {
            alert("Error getting simple product data!");
        }
    }).fail(function () {
        alert("Error getting simple product data!");
    });
}

function removeQuickOrderItem(itemIndex) {
    if (itemIndex != 0) {
        jQuery('#quick-order-items').find('tbody').find('#info_' + itemIndex).remove();
        index--;
    }
}

function addQuickOrderItem() {
    index++;
    var itemRowHtml =
        '<tr class="item-info" id="info_' + index + '"> ' +
        '<td>' +
        '<input class="item-sku" id="item-sku_' + index + '" name="sku_' + index + '" value="" type="text" onchange="updateSkuInformation(jQuery(this).val(), jQuery(\'#item-qty_' + index + '\').val(), \'' + index + '\')"/>' +
        '<input class="item-id" id="item-id_' + index + '" name="id_' + index + '" value="" type="hidden"/>' +
        '</td> ' +
        '<td><span class="item-name" id="item-name_' + index + '">Not Available</span></td> ' +
        '<td><span class="item-price" id="item-price_' + index + '">Not Available</span></td> ' +
        '<td><input class="item-qty" id="item-qty_' + index + '" name="qty_' + index + '" value="1" type="text" maxlength="12" onchange="updateSkuInformation(jQuery(\'#item-sku_' + index + '\').val(), jQuery(this).val(), \'' + index + '\')"/></td> ' +
        '<td><a href="javascript:void(0);" onclick="removeQuickOrderItem(' + index + ')">Remove this entry</a></td> ' +
        '</tr>';
    jQuery('#quick-order-items').find('tbody').append(itemRowHtml);
}