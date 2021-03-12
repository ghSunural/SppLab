<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="2.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:msxsl="urn:schemas-microsoft-com:xslt" exclude-result-prefixes="msxsl">
    <xsl:output method="html" indent="yes"/>

    <xsl:template match="/">
        <html>
            <head>
                <style>

                    .Dictionary{

                    }

                    .DictionaryEntry {

                    margin-top: 2rem;
                    }

                    .NestEntry {

                    }

                    .Headword {
                    font-size: 1.2rem;
                    font-weight: bold;
                    color: #0070C0;
                    }

                    .MultiWordUnit
                    {


                    color: #2E74B5;
                    }

                    .PartOfSpeech
                    {
                    color: rgba(0, 0, 0, .3);

                    }

                    .MultiWordUnitBlock{


                    margin-left: 50px;


                    }

                    .ForeignText{
                    font-style: italic;

                    }


                    .SubjectField{
                    font-family: 'Times New Roman', serif;
                    font-weight: normal;
                    font-style: italic;
                    color: #000000;

                    }

                    .Translation {
                    font-weight: bold;
                    }

                    .Definition {

                    text-align: justify;
                    }

                    .Etymology{

                    }

                    .Definition:before {
                    content: " - ";
                    }

                    .Note{

                    }

                    .DefinitionSource{
                    color: #a52a2a;
                    }


                    .Source{

                    font-style: italic;
                    font-size: 1.3rem;

                    }


                    Definition_in_CompositionalPhraseCtn{


                    }

                    .SenseGroup{

                    }

                    Definition_notin_CompositionalPhraseCtn{

                    }

                    .CompositionalPhraseCtn {
                    }

                    .Arial_b {
                    font-family: Arial, sans-serif;
                    font-weight: bold;
                    color: #000000;
                    }

                    .Arial_b_blue {
                    font-family: Arial, sans-serif;
                    font-weight: bold;
                    color: #0000ff;
                    }

                    .Arial_bo {
                    font-family: Arial, sans-serif;
                    font-weight: bold;
                    font-style: italic;
                    color: #000000;
                    }

                    .Times {
                    font-family: 'Times New Roman', serif;
                    font-weight: normal;
                    color: #000000;
                    }

                    .Times_o {
                    font-family: 'Times New Roman', serif;
                    font-weight: normal;
                    font-style: italic;
                    color: #000000;
                    }

                    .bold-italic{
                    font-style: italic;
                    font-weight: bold;

                    }

                    .reference{
                    font-style: italic;
                    font-size: 1.2rem;
                    font-family: 'Adobe Devanagari', serif;

                    }

                    .Times_b {
                    font-family: 'Times New Roman', serif;
                    font-weight: bold;
                    color: #000000;
                    }

                    .Times_SC {
                    font-family: 'Times New Roman', serif;
                    font-weight: normal;
                    font-variant: small-caps;
                    color: #000000;
                    }

                    .IFA {
                    font-family: 'Times PhoneticIPA', serif;
                    font-weight: normal;
                    color: #000000;
                    }

                    .italic {
                    font-weight: normal;
                    font-style: italic;
                    }

                    .b {
                    font-weight: bold;
                    }

                    .body {
                    font-family: 'Play', serif;


                    max-width: 700px;
                    margin: 0 auto;
                    }

                </style>
            </head>
            <body class="body">
                <h1>Глоссарий терминов разведочной геофизики</h1>
                <h2>к статьям «Near Surface Applied Geophysics» (стр. 70-103) автора Марка Э. Эверетт</h2>
                <h3>создано: Малахова Л.Л.</h3>
                <xsl:apply-templates/>
            </body>
        </html>
    </xsl:template>

    <xsl:template match="NestEntry">
        <div class="NestEntry">
            <xsl:apply-templates/>
        </div>
    </xsl:template>


    <xsl:template match="InternationalScientificTerm">
        <span class="InternationalScientificTerm">
            &#176;<xsl:apply-templates/>
        </span>
    </xsl:template>

    <xsl:template match="ForeignText">
        <span class="ForeignText">
            <xsl:apply-templates/>
        </span>
    </xsl:template>




    <xsl:template match="MultiWordUnitBlock">
        <div class="MultiWordUnitBlock">
            <xsl:apply-templates/>
        </div>
    </xsl:template>

    <xsl:template match="MultiWordUnit">
        <div class="MultiWordUnit">
            <xsl:apply-templates/>
        </div>
    </xsl:template>


    <xsl:template match="DictionaryEntry">
        <div class="DictionaryEntry" id="{@identifier}">
            <xsl:apply-templates/>
        </div>
    </xsl:template>

    <xsl:template match="Ptr">
        <span class="bold-italic">см. </span>
        <a href="#{@xlink-href}" class="italic reference"><xsl:apply-templates/></a>
    </xsl:template>

    <xsl:template match="NormativeStatusCtn">
        <span class="NormativeStatusCtn">
            <xsl:apply-templates/>
        </span>
    </xsl:template>







    <xsl:template match="SenseGroup">
        <div class="SenseGroup">
            <xsl:apply-templates/>
        </div>
    </xsl:template>

    <xsl:template match="HeadwordCtn">
        <xsl:apply-templates/>
    </xsl:template>

    <xsl:template match="CompositionalPhraseBlock">
        <xsl:apply-templates/>
    </xsl:template>


    <xsl:template match="Etymology">
        {<xsl:apply-templates/>}
    </xsl:template>



    <xsl:template match="CompositionalPhraseCtn">
        <xsl:choose>
            <xsl:when test="position()=1">
                <span class="Times CompositionalPhraseCtn">
                    <xsl:text>;</xsl:text>
                </span>
            </xsl:when>
            <xsl:otherwise>
                <span class="Times">
                    <xsl:text>;</xsl:text>
                </span>
            </xsl:otherwise>
        </xsl:choose>
        <xsl:apply-templates/>
    </xsl:template>


    <xsl:template match="TranslationCtn">
        <span class="TranslationCtn">
            <xsl:choose>
                <xsl:when test="preceding-sibling::TranslationCtn">
                    <span class="Times">
                        <xsl:text>; </xsl:text>
                    </span>
                </xsl:when>
                <xsl:otherwise>
                    <span class="Times">
                        <!--  <xsl:text></xsl:text>-->
                    </span>
                </xsl:otherwise>
            </xsl:choose>

            <xsl:choose>
                <xsl:when test="child::Register">
                    <span class="Times_o">

                        <xsl:value-of select="Register"/>
                    </span>
                </xsl:when>
                <xsl:when test="child::GeographicalUsage">
                    <span class="Times_o">
                        <xsl:value-of select="GeographicalUsage"/>
                    </span>
                </xsl:when>
            </xsl:choose>
            <xsl:apply-templates/>
        </span>
    </xsl:template>


    <xsl:template match="Headword">
        <div class="Headword">
            <xsl:apply-templates/>
        </div>
    </xsl:template>

    <xsl:template match="PartOfSpeech">
        <span class="PartOfSpeech">
            <xsl:text></xsl:text>
            <xsl:choose>
                <xsl:when test="@value='noun'">
                    <xsl:text>noun</xsl:text>
                </xsl:when>
            </xsl:choose>
        </span>
    </xsl:template>




    <xsl:template name="insertCompositionalPhraseText">
        <xsl:choose>
            <xsl:when test="preceding-sibling::CompositionalPhrase">
                <span class="Times">
                    <xsl:text>;</xsl:text>
                </span>
            </xsl:when>
            <xsl:otherwise>
                <span class="Times">
                    <xsl:text></xsl:text>
                </span>
            </xsl:otherwise>
        </xsl:choose>
        <span class="Arial_bo">
            <xsl:apply-templates/>
        </span>
    </xsl:template>

    <xsl:template match="Translation">
        <span class="Translation">
            <xsl:apply-templates/>
        </span>
    </xsl:template>

    <xsl:template match="GrammaticalGender">
        <span class="GrammaticalGender">
            <xsl:text></xsl:text>
            <xsl:choose>
                <xsl:when test="@value='masculine'">
                    <xsl:text>m</xsl:text>
                </xsl:when>
                <xsl:when test="@value='feminine'">
                    <xsl:text>f</xsl:text>
                </xsl:when>
                <xsl:when test="@value='neuter'">
                    <xsl:text>n</xsl:text>
                </xsl:when>
            </xsl:choose>
        </span>
    </xsl:template>

    <xsl:template match="Note">
        <span class="Note">
            &lt;<xsl:apply-templates/>&gt;
        </span>

    </xsl:template>

    <xsl:template match="RangeOfApplication">
        <span class="RangeOfApplication">
            (<xsl:apply-templates/>)
        </span>

    </xsl:template>

    <xsl:template match="SubjectField">
        <span class="SubjectField">
            (<xsl:apply-templates/>)
        </span>
    </xsl:template>

    <xsl:template match="GeographicalUsage">
        <xsl:choose>
            <xsl:when test="not(parent::TranslationCtn)">
                <span class="GeographicalUsage">
                    (<xsl:value-of select="@value"/>)
                </span>
            </xsl:when>
        </xsl:choose>
    </xsl:template>

    <xsl:template match="Pronunciation">
        <span class="Pronunciation">
            /<xsl:apply-templates/>/
        </span>
    </xsl:template>

    <xsl:template match="Source">

        <xsl:choose>
            <xsl:when test="parent::NormativeStatusCtn">
                <span class="Source">
                    <xsl:apply-templates/>
                </span>
            </xsl:when>
            <xsl:when test="not(parent::NormativeStatusCtn)">
                <span class="DefinitionSource">
                    [<xsl:apply-templates/>]
                </span>
            </xsl:when>
        </xsl:choose>



    </xsl:template>


    <xsl:template match="Register">
        <xsl:choose>
            <xsl:when test="not(parent::TranslationCtn)">
                <span class="Register">
                    <xsl:text></xsl:text>
                    <xsl:value-of select="@value"/>
                </span>
            </xsl:when>
        </xsl:choose>
    </xsl:template>

    <xsl:template match="Definition">
        <span class="Definition">
            <xsl:apply-templates/>
        </span>
    </xsl:template>

    <xsl:template match="italic">
        <span class="italic">
            <xsl:value-of select="."/>
        </span>
    </xsl:template>

    <xsl:template match="b">
        <span class="b">
            <xsl:value-of select="."/>
        </span>
    </xsl:template>

    <xsl:template match="sup">
        <sup>
            <xsl:value-of select="."/>
        </sup>
    </xsl:template>

    <xsl:template match="sub">
        <sub>
            <xsl:value-of select="."/>
        </sub>
    </xsl:template>

    <xsl:template match="Stress">
        <xsl:choose>
            <xsl:when test="(@type) and (@type='1ong')">
                <u class="Stress">
                    <xsl:value-of select="."/>
                </u>
            </xsl:when>
        </xsl:choose>
    </xsl:template>


</xsl:stylesheet>
