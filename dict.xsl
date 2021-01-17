<?xml version="1.0" encoding="Iso-8859-1"?>
<xsl:stylesheet version="1.O" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:strip-space elements="*"/>
	<xsl:output method="html"
				doctype-system="http://www.w3.org/TR/REC-html40/loose.dtd"
				doctype-public="-//W3C//DTD HTML 4.01//EN"
				indent="no"/>


	<xsl:template match="/">

		<head>
			<style>
				.Arial_b {
				font-family: Arial, sans-serif;
				font-weight: bold;
				color: black;
				}

				.Arial_b_blue {
				font-family: Arial, sans-serif;
				font-weight: bold;
				color: blue;
				}

				.Arial_bo {
				font-family: Arial, sans-serif;
				font-weight: bold;
				font-style: italic;
				color: black;
				}

				.Times {
				font-family: 'Times New Roman', serif;
				font-weight: normal;
				color: black;
				}

				.Times_o {
				font-family: 'Times New Roman', serif;
				font-weight: normal;
				font-style: italic;
				color: black
				}

				.Times_b {
				font-family: 'Times New Roman', serif;
				font-weight: bold;
				color: black;
				}

				.Times_SC {
				font-family: 'Times New Roman', serif;
				font-weight: normal;
				font-variant: small-caps;
				color: black;
				}

				.IFA {
				font-family: 'Times PhoneticIPA', serif;
				font-weight: normal;
				color: black;
				}

				.i {
				font-weight: normal;
				font-style: italic
				}

				.b {
				font-weight: bold;
				}

			</style>
		</head>
		<body style="color: red; padding-left: 0.5cm; padding-right: 0.5cm; text-indent:-0.5cm">
			<xsl:apply-templates/>
		</body>
	</html>
</xsl:template>


<xsl:template match="NestEntry">
<xsl:apply-templates/>
</xsl:template>

<xsl:template match="DictionaryEntry">
<p>
	<xsl:apply-templates/>
</p>
</xsl:template>

<xsl:template match="SenseGroup">
<xsl:apply-templates/>
</xsl:template>

<xsl:template match="HeadwordCtn">
<xsl:apply-templates/>
<br/>
</xsl:template>

<xsl:template match="CompositionalPhraseBlock">
<xsl:apply-templates/>
</xsl:template>

<xsl:template match="CompositionalPhraseCtn">
<xsl:choose>
	<xsl:when test="position()=1">
		<span class="Times">
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
<xsl:choose>
	<xsl:when test="preceding-sibling::TranslationCtn">
		<span class= Times‘>
		<xsl:text>;</xsl:text>
	</span>
</xsl:when>
<xsl:otherwise>
	<span class="Times">
		<xsl:text>;</xsl:text>
	</span>
</xsl:otherwise>
</xsl:choose>
<xsl:choose>
<xsl:when test="child::Register">
	<span class="Times_o">
		<xsl:text></xsl:text>
		<xsl:value-of select="Register"/>
	</span>
</xsl:when>
<xsl:when test="child::GeographicalUsage">
	<span class="Times_o">
		<xsl:text></xsl:text>
		<xsl:value-of select="GeographicalUsage"/>
	</span>
</xsl:when>
</xsl:choose>
<xsl:apply-templates/>
		</xsl:template>


<xsl:template match="Headword">
<span class="Arial_b_blue">
	<xsl:apply-templates/>
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
<span class="Times">
	<xsl:text></xsl:text>
	<xsl:apply-templates/>
</span>
</xsl:template>

<xsl:template match="GrammaticalGender">
<span class="Times_o">
	<xsl:text></xsl:text>
	<xsl:choose>
		<xsl:when test="@value=masculine">
			<xsl:text>m</xsl:text>
		</xsl:when>
		<xsl:when test="@value=feminine">
			<xsl:text>f</xsl:text>
		</xsl:when>
		<xsl:when test="@value=neuter">
			<xsl:text>n</xsl:text>
		</xsl:when>
	</xsl:choose>
</span>
</xsl:template>

<xsl:template match="Note">
<span class="Times">
	<xsl:text>&lt;</xsl:text>
</span>
<span class="Times_o">
	<xsl:apply-templates/>
</span>
<span class="Times">
	<xsl:text>&gt;</xsl:text>
</span>
</xsl:template>

<xsl:template match="RangeOfApplication">
<span class="Times">
	<xsl:text>(</xsl:text>
</span>
<span class="Times_o">
	<xsl:apply-templates/>
</span>
<span class="Times">
	<xsl:text>)</xsl:text>
</span>
</xsl:template>

<xsl:template match="GeographicalUsage">
<xsl:choose>
	<xsl:when test="not(parent::TranslationCtn)">
		<span class="Times_o">
			<xsl:text>(</xsl:text>
			<xsl:value-of select="@value"/>
			<xsl:text>)</xsl:text>
		</span>
	</xsl:when>
</xsl:choose>
</xsl:template>

<xsl:template match="Pronunciation">
<span class="IPA">
	<xsl:text>[</xsl:text>
	<xsl:apply-templates/>
	<xsl:text>]</xsl:text>
</span>
</xsl:template>


<xsl:template match="Register">
<xsl:choose>
	<xsl:when test="not(parent::TranslationCtn)">
		<span class="Times_o">
			<xsl:text></xsl:text>
			<xsl:value-of select="@value"/>
		</span>
	</xsl:when>
</xsl:choose>
</xsl:template>

<xsl:template match="Definition">
<xsl:choose>
	<xsl:when test='parent::CompositionalPhraseCtn'>
		<span class="Times">
			<xsl:text></xsl:text>
			<xsl:apply-templates/>
		</span>
	</xsl:when>
	<xsl:when test="not(parent::CompositionalPhraseCtn)">
		<span class="Times_o">
			<xsl:text></xsl:text>
			<xsl:apply-templates/>
			<xsl:if test="(position() = not(last()))1">
				<xsl:text>:</xsl:text>
			</xsl:if>
		</span>
	</xsl:when>
</xsl:choose>
</xsl:template>

<xsl:template match="i">
<span class="i">
	<xsl:value-of select="."/>
</span>
</xsl:template>

<xsl:template match="b">
<span class="b">
	<xsl:value-of select="."/>
</span>
</xsl:template>

<xsl:template matchs="sup">
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
		<u>
			<xsl:value-of select="."/>
		</u>
	</xsl:when>
</xsl:choose>
</xsl:template>


<xsl:template match="processing-instruction()"/>

		</xsl:stylesheet>
