<h3>Look at this upcoming event(s) (#<?=$nr_of_events?>)</h3>

<table id="events">
    <br/>
    <tr>
        <th>Title</th>
        <th>Location</th>
        <th>Email</th>
        <th>Description</th>
        <th>Date</th>
    </tr>
    <?php foreach ($events as $ev): ?>
        <tr>
            <td><?=$ev->title?></td>
            <td><?=$ev->location?></td>
            <td><?=$ev->email?></td>
            <td><?=$ev->description?></td>
            <td><?=$ev->formatteddate?></td>
        </tr>

    <?php endforeach; ?>
</table>