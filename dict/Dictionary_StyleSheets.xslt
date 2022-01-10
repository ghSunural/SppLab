<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:msxsl="urn:schemas-microsoft-com:xslt" exclude-result-prefixes="msxsl">
    <xsl:output method="html" indent="yes"/>

    <xsl:template match="/">
        <html>
            <head>
                <style>

                    .DictionaryEntry {
                    border: 1px #0c5460 dashed;
                    margin-top: 2rem;
                    }

                    .NestEntry {

                    }

                    .Headword {
                    font-size: 1.2rem;
                    font-style: italic;
                    }

                    .SubjectField{
                    font-family: 'Times New Roman', serif;
                    font-weight: normal;
                    font-style: italic;
                    color: #000000;

                    }

                    .Translation {
                    font-size: 1.2rem;
                    }

                    .Definition {

                    }

                    .Note{

                    }

                    Definition_in_CompositionalPhraseCtn{
                    font-family: 'Times New Roman', serif;
                    font-weight: normal;
                    color: #000000;

                    }

                    Definition_notin_CompositionalPhraseCtn{
                    font-family: 'Times New Roman', serif;
                    font-weight: normal;
                    font-style: italic;
                    color: #000000;

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
                    color: #8000ff;
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
                    max-width: 500px;
                    margin: 0 auto;
                    }

                </style>
            </head>
            <body class="body">
                <h1>Глоссарий терминов разведочной геофизики</h1>
                <h2>к статьям «Near Surface Applied Geophysics»  (стр. 70-103) автора Марка Э. Эверетт</h2>
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

    <xsl:template match="DictionaryEntry">
        <div class="DictionaryEntry">
            <xsl:apply-templates/>
        </div>
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
        <div class="TranslationCtn">
            <xsl:choose>
                <xsl:when test="preceding-sibling::TranslationCtn">
                    <span class="Times">
                        <xsl:text>; </xsl:text>
                    </span>
                </xsl:when>
                <xsl:otherwise>
                    <span class="Times">
                        <xsl:text></xsl:text>
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
        </div>
    </xsl:template>


    <xsl:template match="Headword">
        <div class="Arial_b_blue Headword">
            <xsl:apply-templates/>
        </div>
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
        <div class="Times Translation">
            <xsl:apply-templates/>
        </div>
    </xsl:template>

    <xsl:template match="GrammaticalGender">
        <span class="Times_o GrammaticalGender">
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
        <span class="Times_o Note">
            &lt;<xsl:apply-templates/>&gt;
        </span>

    </xsl:template>

    <xsl:template match="RangeOfApplication">
        <span class="Times_o RangeOfApplication">
            (<xsl:apply-templates/>)
        </span>
      >
    </xsl:template>

    <xsl:template match="SubjectField">
        <span class="Times_o SubjectField">
            (<xsl:apply-templates/>)
        </span>
    </xsl:template>

    <xsl:template match="GeographicalUsage">
        <xsl:choose>
            <xsl:when test="not(parent::TranslationCtn)">
                <span class="Times_o GeographicalUsage">
                    (<xsl:value-of select="@value"/>)
                </span>
            </xsl:when>
        </xsl:choose>
    </xsl:template>

    <xsl:template match="Pronunciation">
        <span class="IPA Pronunciation">
            [<xsl:apply-templates/>]
        </span>
    </xsl:template>


    <xsl:template match="Register">
        <xsl:choose>
            <xsl:when test="not(parent::TranslationCtn)">
                <span class="Times_o Register">
                    <xsl:text></xsl:text>
                    <xsl:value-of select="@value"/>
                </span>
            </xsl:when>
        </xsl:choose>
    </xsl:template>

    <xsl:template match="Definition">
        <xsl:choose>
            <xsl:when test="parent::CompositionalPhraseCtn">
                <span class="Times Definition Definition_in_CompositionalPhraseCtn">
                    <xsl:apply-templates/>
                </span>
            </xsl:when>
            <xsl:when test="not(parent::CompositionalPhraseCtn)">
                <div class="Times_o Definition Definition_notin_CompositionalPhraseCtn">
                    <xsl:apply-templates/>
                    <xsl:if test="(position() = not(last()))">
                        <xsl:text>:</xsl:text>
                    </xsl:if>
                </div>
            </xsl:when>
        </xsl:choose>
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
