<?php

function append_digital_signature(
    $surat,
    $template_signature,
    $output,
    $signature_image,
    $tanda_tangan,
    $keterangan
) {
    $mainTemplateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($surat);

    // $innerTemplateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template_signature);
    $mainTemplateProcessor->setImageValue("image", array('path' => $signature_image, 'width' => 180, 'height' => 180, 'ratio' => false));
    $mainTemplateProcessor->setImageValue("image1", array('path' => $tanda_tangan, 'width' => 80, 'height' => 80, 'ratio' => false));
    $mainTemplateProcessor->setValue("keterangan", $keterangan);

    // $innerXml = $innerTemplateProcessor->gettempDocumentMainPart();
    // $innerXml = preg_replace('/^[\s\S]*<w:body>(.*)<\/w:body>.*/', '$1', $innerXml);

    // remove tag containing header, footer, images
    // $innerXml = preg_replace('/<w:sectPr>.*<\/w:sectPr>/', '', $innerXml);

    // inject internal xml inside main template
    $mainXml = $mainTemplateProcessor->gettempDocumentMainPart();
    // $mainXml = preg_replace('/<\/w:body>/', '<w:p><w:r><w:br w:type="page" /><w:lastRenderedPageBreak/></w:r></w:p>' . $innerXml . '</w:body>', $mainXml);
    $mainTemplateProcessor->settempDocumentMainPart($mainXml);

    $mainTemplateProcessor->saveAs($output);
}
