<td><?= $account->id ?></td>
<td><?= $account->name ?></td>
<td><?= $account->surname ?></td>
<td><?= $account->personalID ?></td>
<td><?= $account->accountNumber ?></td>
<td>€ <?= $account->amount ?><br>¥ <?= $amount = (App\Currency::getRate('JPY') * $account->amount) ?></td>