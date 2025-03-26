function clearEvents(type) {
    if (type == "base") {
        $(".select-multiple-event").val(null).trigger("change");
    } else if (type == "premium") {
        $(".select-single-event").val(null).trigger("change");
    } else {
        $(".select-multiple-event").val(null).trigger("change");
        $(".select-single-event").val(null).trigger("change");
    }

    // $(".select-mega-event").val(null).trigger("change");
}

const rollNumberInput = $(".usn");

rollNumberInput.on("focusout", function () {
    const rollNumber = rollNumberInput.val().trim();

    const regex = /^4JK(19|20|21|22)(CS|EC|ME|CV|IS)\d{3}$/;

    if (regex.test(rollNumber)) {
        $(".select-pass").val("AJIET");
        showEvents();
    }
});

function showEvents() {
    const pass_type = $(".select-pass").val();
    if (pass_type == "base") {
        $(".select-single-event-div").show();
        $(".condition-div").hide();
        $(".ajiet-students").hide();
        $(".select-payment-text").show();
        $(".select-mega-event-div").show();
        $(".pay-150").show();
        $(".pay-300").hide();
    } else if (pass_type == "premium") {
        $(".unselectable").prop("disabled", true);
        $(".select-single-event-div").hide();
        $(".condition-div").show();
        $(".ajiet-students").hide();
        $(".select-mega-event-div").show();
        $(".select-payment-text").show();
        $(".pay-150").hide();
        $(".pay-300").show();
        $(".select-limit-message").hide();
    } else if (pass_type == "mega") {
        $(".unselectable").prop("disabled", true);
        $(".select-mega-event-div").show();
        $(".select-payment-required").removeAttr("required");
        $(".payment_screnshot").removeAttr("required");
        $(".select-payment-text").hide();
        $(".select-single-event-div").hide();
        $(".condition-div").hide();
        $(".ajiet-students").hide();
        $(".pay-150").hide();
        $(".pay-300").hide();
    } else if (pass_type == "AJIET") {
        $(".unselectable").prop("disabled", true);
        $(".ajiet-students").show();
        $(".condition-div").hide();
        $(".select-mega-event-div").show();
        $(".select-payment-required").removeAttr("required");
        $(".select-payment-text").hide();
        $(".select-single-event-div").hide();
        $(".pay-150").hide();
        $(".pay-300").hide();
    }

    clearEvents(pass_type);
}

$(function () {
    $(".select-multiple-event").select2();
    $(".select-mega-event").select2();
    showEvents();
});

$(".select-limit-message").hide();
$(".select-pass").on("change", function () {
    if (this.value == "base") {
        clearEvents(this.value);
        $(".select-single-event-div").show();
        $(".condition-div").hide();
        $(".ajiet-students").hide();
        $(".select-payment-text").show();
        $(".select-mega-event-div").show();
        $(".pay-150").show();
        $(".pay-300").hide();
    } else if (this.value == "premium") {
        clearEvents(this.value);
        $(".unselectable").prop("disabled", true);
        $(".select-single-event-div").hide();
        $(".condition-div").show();
        $(".ajiet-students").hide();
        $(".select-mega-event-div").show();
        $(".select-payment-text").show();
        $(".pay-150").hide();
        $(".pay-300").show();
        $(".select-limit-message").hide();
    } else if (this.value == "mega") {
        clearEvents(this.value);
        $(".unselectable").prop("disabled", true);
        $(".select-mega-event-div").show();
        $(".select-payment-required").removeAttr("required");
        $(".payment_screnshot").removeAttr("required");
        $(".select-payment-text").hide();
        $(".select-single-event-div").hide();
        $(".condition-div").hide();
        $(".ajiet-students").hide();
        $(".pay-150").hide();
        $(".pay-300").hide();
    } else if (this.value == "AJIET") {
        clearEvents(this.value);
        $(".unselectable").prop("disabled", true);
        $(".ajiet-students").show();
        $(".condition-div").hide();
        $(".select-mega-event-div").show();
        $(".select-payment-required").removeAttr("required");
        $(".select-payment-text").hide();
        $(".select-single-event-div").hide();
        $(".pay-150").hide();
        $(".pay-300").hide();
    }
});

var select = $(".with-condition");
select.on("change", function () {
    var count = select.find("option:selected").length;
    if (count >= 4) {
        $(".unselectable").prop("disabled", true);
        select.find("option:not(:selected)").prop("disabled", true);
        $(".select-defualt-text").hide();
        $(".select-limit-message").show();
    } else {
        select.find("option").prop("disabled", false);
        $(".unselectable").prop("disabled", true);
        $(".select-limit-message").hide();
        $(".select-defualt-text").show();
    }
});

$(".eventlist option")
    .filter(function () {
        return $(this).text() == "Fusion Night with Mysore Express";
    })
    .css("background-color", "yellow");
// $(document).load(function () {
//     $("img[src='https://www.flipbookpdf.net/web/site/img/logonet.png']").hide()
//    });

// select.find('option:[value="select-events"]').prop('disabled', true);d

// for validating event selection
function validateRegistration() {
    const passType = document.getElementsByName("pass_type");
    const selectEvents = document.getElementsByName("events[]");
    switch (passType[0].value) {
        case "base":
            if (
                selectEvents[0].value == "Select Event" ||
                !selectEvents[0].value
            ) {
                alert("Please select an Event");
                return false;
            }
            break;
        case "premium":
            console.log(selectEvents[1].value);
            if (!selectEvents[1].value) {
                alert("Please select an Event");
                return false;
            }
            break;
        case "mega":
            console.log(selectEvents[3].value);
            if (!selectEvents[3].value) {
                alert("Please select an Event");
                return false;
            }
            break;
        case "AJIET":
            if (!selectEvents[2].value && !selectEvents[3].value) {
                alert("Please select an Event");
                return false;
            }
            break;
    }
}



