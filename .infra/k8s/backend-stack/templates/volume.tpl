{{- define "volumeMount" }}
- name: app-volume
  mountPath: /var/www/html/.env
  subPath: .env
{{- end }}

{{- define "volumes" }}
- name: app-volume
  secret:
    secretName: {{ .Values.global.secretName }}
    items:
      - key: .env
        path: .env
{{- end }}


{{- define "jwtKeyPairsVolumeMount" }}
- name: app-keys-volume
  mountPath: /var/www/html/config/jwt
{{- end }}


{{- define "jwtKeyPairsVolumes" }}
- name: app-keys-volume
  secret:
    secretName: {{ .Values.global.secretName }}
    items:
      - key: private.pem
        path: private.pem
      - key: public.pem
        path: public.pem
{{- end }}