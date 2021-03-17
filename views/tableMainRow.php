<td><?= $account->id ?></td>
<td><?= $account->name ?></td>
<td><?= $account->surname ?></td>
<td><?= $account->personalID ?></td>
<td><?= $account->accountNumber ?></td>
<td>€ <?= $account->amount ?> ¥ or GBP <?= $amount = (App\Json::getRate('GBP') * $account->amount) ?></td>