function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// old('')



// dashboard show/countItems custom js ================

// ============== foods ==========================
function showBreakfast() {
    document.getElementById('showCountTotal').classList.add('hidden');
    document.getElementById('showCountLunch').classList.add('hidden');
    document.getElementById('showCountBreakfast').classList.remove('hidden');
    document.getElementById('showCountMeal').classList.add('hidden');
    document.getElementById('showCountDinner').classList.add('hidden');
}

function showLunch() {
    document.getElementById('showCountTotal').classList.add('hidden');
    document.getElementById('showCountLunch').classList.remove('hidden');
    document.getElementById('showCountBreakfast').classList.add('hidden');
    document.getElementById('showCountMeal').classList.add('hidden');
    document.getElementById('showCountDinner').classList.add('hidden');

}

function showTotal() {
    document.getElementById('showCountTotal').classList.remove('hidden');
    document.getElementById('showCountLunch').classList.add('hidden');
    document.getElementById('showCountBreakfast').classList.add('hidden');
    document.getElementById('showCountMeal').classList.add('hidden');
    document.getElementById('showCountDinner').classList.add('hidden');

}

function showMeal() {
    document.getElementById('showCountMeal').classList.remove('hidden');
    document.getElementById('showCountLunch').classList.add('hidden');
    document.getElementById('showCountBreakfast').classList.add('hidden');
    document.getElementById('showCountTotal').classList.add('hidden');
    document.getElementById('showCountDinner').classList.add('hidden');
}

function showDinner() {
    document.getElementById('showCountDinner').classList.remove('hidden');
    document.getElementById('showCountMeal').classList.add('hidden');
    document.getElementById('showCountLunch').classList.add('hidden');
    document.getElementById('showCountBreakfast').classList.add('hidden');
    document.getElementById('showCountTotal').classList.add('hidden');
}

<!-----------     drinks   -------------- -->

function showCountTotalDrinks() {
    document.getElementById('showCountTotalDrinks').classList.remove('hidden');
    document.getElementById('showCountTotalHard').classList.add('hidden');
    document.getElementById('showCountTotalSoft').classList.add('hidden');
    document.getElementById('showCountTotalBeer').classList.add('hidden');
    document.getElementById('showCountTotalWine').classList.add('hidden');
}

function showHard() {
    document.getElementById('showCountTotalDrinks').classList.add('hidden');
    document.getElementById('showCountTotalWine').classList.add('hidden');
    document.getElementById('showCountTotalSoft').classList.add('hidden');
    document.getElementById('showCountTotalBeer').classList.add('hidden');
    document.getElementById('showCountTotalHard').classList.remove('hidden');

}

function showSoft() {
    document.getElementById('showCountTotalDrinks').classList.add('hidden');
    document.getElementById('showCountTotalHard').classList.add('hidden');
    document.getElementById('showCountTotalSoft').classList.remove('hidden');
    document.getElementById('showCountTotalBeer').classList.add('hidden');
    document.getElementById('showCountTotalWine').classList.add('hidden');

}

function showWine() {
    document.getElementById('showCountTotalDrinks').classList.add('hidden');
    document.getElementById('showCountTotalHard').classList.add('hidden');
    document.getElementById('showCountTotalBeer').classList.add('hidden');
    document.getElementById('showCountTotalWine').classList.remove('hidden');
    document.getElementById('showCountTotalSoft').classList.add('hidden');
}

function showBeer() {
    document.getElementById('showCountTotalDrinks').classList.add('hidden');
    document.getElementById('showCountTotalBeer').classList.remove('hidden');
    document.getElementById('showCountTotalHard').classList.add('hidden');
    document.getElementById('showCountTotalWine').classList.add('hidden');
    document.getElementById('showCountTotalSoft').classList.add('hidden');
}

<!------------------- Bookings Tables  ------------------- -->

function showCountTotalBookings() {
    document.getElementById('showCountTotalBookings').classList.remove('hidden');
    document.getElementById('showCountTotalSingle').classList.add('hidden');
    document.getElementById('showCountTotalCouple').classList.add('hidden');
    document.getElementById('showCountTotalFamily').classList.add('hidden');
    document.getElementById('showCountTotalGroup').classList.add('hidden');
}

function showSingle() {
    document.getElementById('showCountTotalBookings').classList.add('hidden');
    document.getElementById('showCountTotalSingle').classList.remove('hidden');
    document.getElementById('showCountTotalCouple').classList.add('hidden');
    document.getElementById('showCountTotalFamily').classList.add('hidden');
    document.getElementById('showCountTotalGroup').classList.add('hidden');
}

function showCouple() {
    document.getElementById('showCountTotalBookings').classList.add('hidden');
    document.getElementById('showCountTotalCouple').classList.remove('hidden');
    document.getElementById('showCountTotalSingle').classList.add('hidden');
    document.getElementById('showCountTotalFamily').classList.add('hidden');
    document.getElementById('showCountTotalGroup').classList.add('hidden');
}

function showFamily() {
    document.getElementById('showCountTotalBookings').classList.add('hidden');
    document.getElementById('showCountTotalCouple').classList.add('hidden');
    document.getElementById('showCountTotalSingle').classList.add('hidden');
    document.getElementById('showCountTotalFamily').classList.remove('hidden');
    document.getElementById('showCountTotalGroup').classList.add('hidden');
}

function showGroup() {
    document.getElementById('showCountTotalBookings').classList.add('hidden');
    document.getElementById('showCountTotalCouple').classList.add('hidden');
    document.getElementById('showCountTotalSingle').classList.add('hidden');
    document.getElementById('showCountTotalFamily').classList.add('hidden');
    document.getElementById('showCountTotalGroup').classList.remove('hidden');
}



//================  slugify bolg title  =================

$("#blog_title").keyup(function () {
    var str = $(this).val();
    var trims = $.trim(str)
    var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
    $("#slug").val(slug.toLowerCase())
})

