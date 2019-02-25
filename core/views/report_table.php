
<div class="report">
    <div class="report__title"> <?= $this->getReportName(); ?> </div>
    <?php if(!empty($this->getParamsTitle())): ?>
        <div class="report__params">
            <div class="report__params-title"> <?= $this->getParamsTitle(); ?> </div>
            <div class="report__date-start"> c: <?= $this->getDateStart(); ?> </div>
            <div class="report__date-end"> по: <?= $this->getDateEnd(); ?> </div>
        </div>
    <?php endif; ?>
    <table class="report__table">
        <tr>
            <?php foreach ($this->getResultTableFields() as $field): ?>
                <td class="report__title-cell">
                    <?= $field ?>
                </td>
            <?php endforeach; ?>
        </tr>
        <?php foreach ($this->getResultTable() as $row => $data): ?>
            <tr>
                <?php foreach ($data as $content): ?>
                    <td class="report__cell">
                        <?= $content ?>
                    </td>
                <?php endforeach; ?>            
            </tr>
        <?php endforeach; ?>
    </table>
</div>