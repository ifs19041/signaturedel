<?php

function append_digital_signature(
    $surat,
    $template_signature,
    $output,
    $signature_image,
    $keterangan
) {
    $mainTemplateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($surat);

    // $innerTemplateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template_signature);
    $mainTemplateProcessor->setImageValue("image", array('path' => $signature_image, 'width' => 300, 'height' => 300, 'ratio' => false));
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
