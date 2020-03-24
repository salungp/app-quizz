$('.log-out').on('click', function() {
    return window.confirm('Yakin?');
});

$('.nav-link[href="'+location.href+'"]').parents('.nav-item').addClass('active');

const letters = ['a', 'b', 'c', 'd', 'e'];

function answerTemplate(total) {
    var choiceOpen = `<div class="form-group">`;
    var choice = `<input type="text" id="answer" class="form-control" placeholder="Masukkan pilihan ganda" required>
                  </div>`;
    var changeGroup = ``;
    var answer;
    for (var letter = 0; letter < total; letter++) {
        choice = letters[letter] + '.' + choice;
        let pecah = choice.split('.');
        answer = `<label for="${pecah[0]}">${pecah[0]}</label>.<input type="text" id="${pecah[0]}" class="form-control" name="${pecah[0]}" placeholder="Masukkan pilihan ganda" required>
        </div>`;
        changeGroup += choiceOpen + answer;
    }
    return changeGroup;
}

function answerKey(total) {
    var answer;
    for (var num = 0; num < total; num++) {
        answer += `<option value="${letters[num]}">${letters[num]}</option>`;
    }
    return answer;
}

$('#answer-total').on('change', function(e) {
    $('.answer-wrapper').html(answerTemplate(e.target.value));
    $('.answer-wrapper').addClass('card');
    $('.answer-wrapper').addClass('card-body');
    $('#answer-key').html(answerKey(e.target.value));
});